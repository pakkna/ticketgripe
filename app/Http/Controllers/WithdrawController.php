<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
    }
    public function withdraw()
    {
        $total_credit_admin = 0;
        $event_details = DB::table('events')
        ->where('events.user_id', Auth::user()->id)
        ->orderBy('id', 'ASC')
        //need collection and soldout form order table
        ->get();

        foreach ($event_details as $value) {
            
            $total_credit = DB::table('orders')->select('sold_amount')->where('event_id', $value->id)->get();
            foreach ($total_credit as $group144) {
                $total_credit_admin += $group144->sold_amount;
            }
        }
        return View('files.withdraw',compact('total_credit_admin'));
    }

    public function count_money($id)
    {
        $total_credit_admin = 0;
        $event_details = DB::table('events')
        ->select('id')
        ->where('events.user_id', $id)
        ->get();

        foreach ($event_details as $value) {
            
            $total_credit = DB::table('orders')->select('sold_amount')->where('event_id', $value->id)->get();
            foreach ($total_credit as $group144) {
                $total_credit_admin += $group144->sold_amount;
            }
        }
        return $total_credit_admin;
    }

    public function withdraw_money(Request $request)
    {
        $total_credit = $this->count_money(Auth::user()->id);
        if($request->payment_type!="Bank"){
            $request->bank_name==null;
            $request->branch_name=null;
        }

        if($request->amount > $total_credit || $request->amount<500){
            return redirect()->back()->with('flashMessageDanger','You can not withdraw this amount. Check our withdraw policy !');
        }else{

            $data =[
            "user_id" =>Auth::user()->id,
            "payment_type" =>$request->payment_type,
            "account_name" =>$request->account_name,
            "account_number" =>$request->account_no,
            "bank_name" =>$request->bank_name,
            "bank_branch_name" =>$request->branch_name,
            "withdraw_amount" => $request->amount,
            "previous_amount" =>$total_credit,
            "currency" => $request->currency == 1 ? 'USD' : 'BDT',
            "status" =>0,
            "created_at" => date('Y-m-d H:i:s')
            ];

            try {
                DB::table('withdraw')->insert($data);
                return redirect()->back()->with('flashMessageSuccess','Your withdraw request submitted Successfully. After verifing, amount will be sent to your account.');
            } catch (\Exception $th) {
                return redirect()->back()->with('flashMessageDanger','Request submit Error !');
            }
           
        }
    }

    public function withdraw_status(Request $request)
    {
        $dataSet = DB::table('withdraw')->where('user_id', Auth::user()->id)->get();
        return Datatables::of($dataSet)->make(true);
    }

    public function withdraw_history()
    {
        return view('dashboard.withdraw.withdraw');
    }

    public function withdraw_list_datatable(Request $request)
    {

        $date = $request->get('columns')[9]['search']['value'];

        if ($date != '') {

            list($start_date, $end_date) = explode('~', preg_replace('/\s+/', '', $date));

            $start_date = date_validate($start_date);
            $end_date = date_validate($end_date);
        } else {

            $time = strtotime(date('Y-m-d') . '-365 days');
            $start_date = date_validate(date('Y-m-d', $time));
            $end_date = date_validate(date('Y-m-d'));
        }

        $dataSet = DB::table("withdraw")
            ->whereBetween('created_at', [$start_date . " 00:00:00", $end_date . " 23:59:59"])
            ->orderBy('created_at', 'DESC');

        return Datatables::of($dataSet)->make(true);
    }

    public function withdraw_confirmation($user_id, $id,$amount){

        $user_credit = User::where('id', $user_id)->firstOrFail();

        $withdraw_at = date("Y-m-d H:i:s");
        $data = ["status" => 1, "withdraw_at" => $withdraw_at, "previous_amount"=> $user_credit->balance];
        $new_balance = $user_credit->balance - $amount;
        $updated_balance = ["balance"=> $new_balance];
        $msg = "Withdrwal Initiate Successfully";

        $userUpdate = DB::table('users')->where('id', $user_id)->update($updated_balance);
        $dataSet = DB::table('withdraw')->where('id', $id)->update($data);

        if ($dataSet == true) {

            return redirect("withdraw-history")->with("flashMessageSuccess", $msg);
        } else {

            return redirect("withdraw-history")->with("flashMessageDanger", "Have Some Problem To Add !");
        }
    }

    public function withdraw_decline($id)
    {
        $data = ["status" => 2];
        $msg = "Withdrwal Declined Successfully";
        $dataSet = DB::table('withdraw')->where('id', $id)->update($data);

        if ($dataSet == true) {

            return redirect("withdraw-history")->with("flashMessageSuccess", $msg);
        } else {

            return redirect("withdraw-history")->with("flashMessageDanger", "Have Some Problem To Add !");
        }
    }
}

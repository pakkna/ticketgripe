<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class UserInfoController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function user_info()
    {
        return view('dashboard.user_info.user_info');
    }

    public function user_info_dt(Request $request)
    {
        $dataSet = DB::table("users")
            ->select('id','username','fullname','email','mobile','created_at','status', DB::raw('(SELECT IFNULL(sum(orders.sold_amount),0) FROM `orders` WHERE users.id=orders.user_id) as sold_amount'), DB::raw('(SELECT IFNULL(count(events.id),0) FROM `events` WHERE users.id=events.user_id) as event_count'))
            ->where('user_type', 'user')
            ->orderBy('created_at', 'DESC');

        return Datatables::of($dataSet)->make(true);
    }

    public function user_info_modal(Request $request)
    {
        $user_info = DB::table('users')->select('fullname','country','organization','address', DB::raw('(SELECT IFNULL(count(events.id),0) FROM `events` WHERE users.id=events.user_id) as event_count'))->where('id', $request->id)->first();
        echo json_encode($user_info);
    }

    public function suspend_user(Request $request)
    {
        $data = [
            'status' => $request->status == 1 ? 0 : 1
        ];
        try {
            DB::beginTransaction();
            $dataSet = DB::table('users')->where('id', $request->id)->update($data);
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return 0;
        }
    }
}
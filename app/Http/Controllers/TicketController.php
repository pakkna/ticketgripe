<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddTicketRequest;
use Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
    }

    public function all_ticket(Request $request){

        $dataSet = DB::table("tickets")
            ->select('tickets.*', DB::raw('(SELECT IFNULL(sum(sold_tickets),0) as total_sold_count FROM `orders` WHERE orders.ticket_id=tickets.id)  as total_sold_count'))
            //->where('user_id', Auth::id())
            ->where('event_id', $request->event_id)
            ->get();
        return Datatables::of($dataSet)->make(true);
    }


    public function create_tickets(AddTicketRequest $request){

        $data= [
            'ticket_type' => $request->ticket_type,
            'ticket_price' => $request->ticket_price,
            'quantity' => $request->quantity,
            'selling_currency' => $request->currency,
            'selling_date' => datetime_validate_24($request->selling_date),
            'untill_date' => datetime_validate_24($request->untill_date),
            'show_sell_untill_date' => isset($request->show_sell_untill_date) ? 1 : 0,
            'hide_ticket' => isset($request->hide_ticket) ? 1 : 0,
            'fees_consume' =>$request->fees_consume,
            'short_note' => $request->short_note,
            'max_ticket_per_order' => $request->max_ticket_per_order,
            'min_ticket_per_order' => $request->min_ticket_per_order,
            'user_id' => Auth::user()->id,
            'event_id' =>$request->event_id,
            'created_at'=>date('Y-m-d h:i:s')
        ];

        try {
            
            $last_ticket_id = DB::table('tickets')->insertGetId($data);
            

            for ($i=0; $i < 3; $i++) { 
                if ($i == 0) {
                    $title = 'Name';
                    $type = 'Text';
                }elseif ($i == 1) {
                    $title = 'Email';
                    $type = 'Email';
                }else{
                    $title = 'Mobile';
                    $type = 'Text';
                }
                $dataSet = [
                    'question_title' => $title,
                    'question_type' => $type,
                    'answer_required' => 'on',
                    'select_specific_ticket' => $last_ticket_id,
                    'user_id' => Auth::user()->id,
                    'event_id' => $request->event_id,
                    'created_at'=>date('Y-m-d h:i:s')
                ];
                DB::table('custom_form')->insert($dataSet);
            }

        return redirect('/event-setup/'.$request->event_id.'/create-ticket')->with('AddTicketSuccess','New Ticket Add Successfully !');

        } catch (\Exception $th) {
            return redirect('/event-setup/'.$request->event_id.'/create-ticket')->with('AddTicketDanger',$th->getMessage());
        }


    }

    public function edit_ticket(Request $request){

        $one_ticket_details= DB::table('tickets')
        ->where('id',$request->id)
        ->first();
       

        $view =  view('eventsetup.edit_ticket',compact('one_ticket_details'))->render();

        return response()->json(['html'=>$view]);
    }

    public function action_edit_ticket(Request $request){

        $data= [
            'ticket_type' => $request->ticket_type,
            'ticket_price' => $request->ticket_price,
            'quantity' => $request->quantity,
            'selling_currency' => $request->currency,
            'selling_date' => datetime_validate_24($request->selling_date),
            'untill_date' => datetime_validate_24($request->untill_date),
            'show_sell_untill_date' => isset($request->show_sell_untill_date) ? 1 : 0,
            'hide_ticket' => isset($request->hide_ticket) ? 1 : 0,
            'fees_consume' =>$request->fees_consume,
            'short_note' => $request->short_note,
            'max_ticket_per_order' => $request->max_ticket_per_order,
            'min_ticket_per_order' => $request->min_ticket_per_order,
            'updated_at'=>date('Y-m-d h:i:s')
        ];

        try {
            
        DB::table('tickets')->where('id',$request->ticket_id)->update($data);

        return redirect('/event-setup/'.$request->event_id.'/tickets')->with('updateTicketSuccess','Ticket Updated Successfully !');

        } catch (\Exception $th) {
            return redirect('/event-setup/'.$request->event_id.'/tickets')->with('updateTicketDanger',$th->getMessage());
        }

    }

    public function ticket_delete(Request $request){

          $data= DB::table('tickets')->where('id',$request->id)->where('user_id',Auth::user()->id)->delete();
         
          if($data==true){
              echo true;
          }else{
            echo false;
          }   
    }

    public function buy_ticket()
    {
        return view('files.ticket');
    }

    public function ticket_detail($event_id,$ticket_id)
    {

        $event_info = DB::table('events')->select('title','start_date','end_date','address','city','state','zip','country','event_logo')->where('id', $event_id)->where('user_id', Auth::user()->id)->first();

        $sponsor_info = DB::table('sponser')->select('sponser_logo')->where('user_id', Auth::user()->id)->where('event_id', $event_id)->get();

        $ticket_type = DB::table('tickets')->select('ticket_type')->where('user_id', Auth::user()->id)->where('id', $ticket_id)->first();

        return view('files.ticket_demo', compact('event_info', 'sponsor_info', 'ticket_type'));
    }
}

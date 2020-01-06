<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddTicketRequest;
use Auth;

class TicketController extends Controller
{
    public function all_ticket(Request $request){

        $dataSet = DB::table("tickets")
            ->where('user_id', Auth::id())
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
            'selling_date' => datetime_validate($request->selling_date),
            'untill_date' => datetime_validate($request->untill_date),
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
            
        DB::table('tickets')->insert($data);

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
            'selling_date' => datetime_validate($request->selling_date),
            'untill_date' => datetime_validate($request->untill_date),
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

          $data= DB::table('tickets')->where('id',$request->id)->delete();
         
          if($data==true){
              echo true;
          }else{
            echo false;
          }   
    }
}

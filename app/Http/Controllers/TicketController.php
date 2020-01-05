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
            // ->where('id', Auth::id())
            ->where('event_id', $request->event_id)
            ->get();
        echo '<pre>'; 
        echo '======================<br>';
        print_r($dataSet);
        echo '<br>======================';
        exit();
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
}

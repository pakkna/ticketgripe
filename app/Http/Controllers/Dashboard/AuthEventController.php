<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class AuthEventController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function event_info($id = null)
    {
        return view('dashboard.event_info.event_info',compact('id'));
    }

    public function event_info_dt(Request $request)
    {
        $date = $request->get('columns')[3]['search']['value'];
        if ($date != '') {
            list($start_date, $end_date) = explode('~', preg_replace('/\s+/', '', $date));
            $start_date = date_validate($start_date);
            $end_date = date_validate($end_date);
        } else {
            $time = strtotime(date('Y-m-d') . '-365 days');
            $start_date = date_validate(date('Y-m-d', $time));
            $end_date = date_validate(date('Y-m-d'));
        }
        $dataSet = DB::table("events")
            ->select('id','title','start_date','end_date','seat_number','created_at','event_status', DB::raw('(SELECT IFNULL(sum(orders.sold_amount),0) FROM `orders` WHERE events.id=orders.event_id) as sold_amount'))
            ->whereBetween('created_at', [$start_date . " 00:00:00", $end_date . " 23:59:59"])
            ->orderBy('created_at', 'DESC');
            if ($request->user_id != null) {
                $dataSet->where('events.user_id', $request->user_id);
            }
        return Datatables::of($dataSet)->make(true);
    }

    public function event_info_single($id)
    {
        $event_info = DB::table('events')
                    ->select('events.*', 'users.fullname', 'users.email')
                    ->join('users', 'users.id', 'events.user_id')
                    ->where('events.id', $id)->first();

        $total_sponsor = DB::table('sponser')->select('id','sponser_name','sponser_logo')->where('event_id', $id)->get();
        $total_ticket = DB::table('tickets')->select('id')->where('event_id', $id)->count();
        $total_credit = DB::table('orders')->where('event_id', $id)->sum('sold_amount');
        $total_ticket_sold = DB::table('orders')->where('event_id', $id)->sum('sold_tickets');
        $total_attendee = DB::table('orders')->where('event_id', $id)->sum('attende_confirm');

        return view('dashboard.event_info.event_info_single',compact('event_info','total_sponsor','total_ticket','total_credit','total_ticket_sold','total_attendee'));

    }
}

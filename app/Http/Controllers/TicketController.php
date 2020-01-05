<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Auth;

class TicketController extends Controller
{
    public function all_ticket(Request $request){

        $dataSet = DB::table("tickets")
             ->where('id', Auth::id())
            ->where('event_id', $request->event_id)
            ->get();

        return Datatables::of($dataSet)->make(true);
    }
}

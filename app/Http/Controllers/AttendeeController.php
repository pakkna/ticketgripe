<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Yajra\Datatables\Datatables;

class AttendeeController extends Controller
{
    public function all_attendee(Request $request){

        $dataSet = DB::table("tickets")
            ->where('user_id', Auth::id())
            ->where('event_id', $request->event_id)
            ->get();
        return Datatables::of($dataSet)->make(true);
    }
}

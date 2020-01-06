<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Yajra\Datatables\Datatables;

class OrderController extends Controller
{
    public function all_order(Request $request){

        $dataSet = DB::table("tickets")
            ->where('user_id', Auth::id())
            ->where('event_id', $request->event_id)
            ->get();
        return Datatables::of($dataSet)->make(true);
    }
    public function order_form(Request $request){

        $dataSet = DB::table("tickets")
            ->where('user_id', Auth::id())
            ->where('event_id', $request->event_id)
            ->get();
            echo '<pre>'; 
            echo '======================<br>';
            print_r($dataSet);
            echo '<br>======================';
            exit();
        return Datatables::of($dataSet)->make(true);
    }
}

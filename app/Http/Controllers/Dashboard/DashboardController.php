<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $total_event = DB::table('events')->count();
        $total_user = DB::table('users')->where('user_type', 'user')->count();
        $total_income = DB::table('orders')->sum('sold_amount');
        $total_rev = DB::table('orders')->sum('system_charge');
        $total_reg = DB::table('orders')->count();
        return view('dashboard.index',compact('total_event','total_income','total_rev','total_user','total_reg'));
    }
}
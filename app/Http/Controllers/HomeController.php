<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return View('files.index');
    }
    public function login()
    {
        return View('files.login');
    }
    public function register()
    {
        return View('files.register');
    }

    public function user_setting()
    {
        return View('files.user_dashboard');
    }
}

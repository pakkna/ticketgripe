<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        return View('files.withdraw');
    }
}

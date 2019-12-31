<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventControler extends Controller
{
    
    public function show_event_form(){

        return View('files.add_event');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Http\Requests\EventRequest;

class EventControler extends Controller
{
    
   
    public function show_my_events(){

        $event_details = DB::table('events')
        ->leftjoin('tickets','events.id','=','tickets.event_id')
        ->select('events.id','title','start_date','end_date','city','seat_number','image_path','seat_number','custom_link','ticket_price','quantity','selling_currency')
        //need collection and soldout form order table
        ->get();

        return View('files.my_events',compact('event_details'));
    }

    public function show_event_form(){

        return View('files.add_event');
    }
    public function event_detail(){

        return View('files.event_detail');
    }

    public function create_event(EventRequest $request){

        $upload_path=EventImageUpload($request->file('event_flyer'),'event_flayer');

        $data= [

            'title' => $request->event_title,
            'start_date' => datetime_validate($request->start_time),
            'end_date' => datetime_validate($request->end_time),
            'image_path' => $upload_path,
            'category' => $request->category,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'seat_number' =>$request->seat_number,
            'hide_date_event_page' =>isset($request->checkbox) ? 1 : 0,
            'description' => $request->event_des,
            'user_id' => Auth::user()->id,
            'event_status' => "Active",
            'created_at'=>date('Y-m-d h:i:s')
        ];

       
        try {
            
          DB::table('events')->insert($data);
       
          return redirect()->route('AddEvent')->with('flashMessageSuccess','New Event Added Succesfullt ! Now Setup Your Event Perfectly On Event Page');

        } catch (\Exception $th) {
            return redirect()->route('AddEvent')->with('flashMessageDanger',$th->getMessage());
        }

    }

    public function event_setup_view($id){

        $event_details = DB::table('events')
        ->leftjoin('tickets','events.id','=','tickets.event_id')
        ->select('events.id','title','start_date','end_date','city','seat_number','image_path','seat_number','custom_link','ticket_price','quantity','selling_currency')
        ->where('events.id',$id)
        //need collection and soldout form order table
        ->first();
        return view('eventsetup.event_sidebar',compact('event_details'));

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EditEventRequest;

class EventControler extends Controller
{
    
   
    public function show_my_events(){

        $event_details = DB::table('events')
        ->leftjoin('tickets','events.id','=','tickets.event_id')
        ->select('events.id','title','start_date','end_date','event_status','city','seat_number','image_path','seat_number','custom_link','ticket_price','quantity','selling_currency')
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

    public function delete_event($id){

      $check =DB::table('events')->where('id',$id)->where('user_id',Auth::user()->id)->first();

     if(count($check)){

        try { 
            DB::table('events')->where('id',$id)->delete();
               
            return redirect()->route('MyEvents')->with('flashMessageSuccess','Your Event Delete Successfully !');
        
            } catch (\Exception $th) {
                return redirect()->route('MyEvents')->with('flashMessageDanger',$th->getMessage());
            }
     }else{
        return redirect()->route('MyEvents')->with('flashMessageDanger',"Your not authorized to delete this event !");
     }
        
      


    }

    public function edit_event(EditEventRequest $request){

        if(!empty($request->event_flyer)){
            $upload_path=EventImageUpload($request->file('event_flyer'),'event_flayer');
        }else{
            $image=DB::table('events')->select('image_path')->where('id',$request->id)->first(); 
            $upload_path=$image->image_path;
        }
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
            'event_status' => $request->status,
            'updated_at'=>date('Y-m-d h:i:s')
        ];

       
        try {
            
        DB::table('events')->where('id',$request->id)->update($data);
       
           return redirect('/event-setup/'.$request->id.'/edit-event')->with('EventSuccess','Your Event Updated Successfully !');

        } catch (\Exception $th) {
            return redirect('/event-setup/'.$request->id.'/edit-event')->with('EventDanger',$th->getMessage());
        }

    }

    public function event_setup_view($id){

        
        $event_details = DB::table('events')
        ->leftjoin('tickets','events.id','=','tickets.event_id')
        ->select('events.id','title','image_path','start_date','end_date','country','address','city','state','zip','event_status','seat_number','category','hide_date_event_page','description','custom_link')
        ->where('events.id',$id)
        //need collection and soldout form order table
        ->first();
        return view('eventsetup.event_sidebar',compact('event_details'));

    }
}

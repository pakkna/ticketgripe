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
    
   public function __construct()
   {
    date_default_timezone_set('Asia/Dhaka');
   }
    public function show_my_events(){
        $total_credit_admin = 0;
        $event_details = DB::table('events')
        ->where('events.user_id', Auth::user()->id)
        ->orderBy('id', 'ASC')
        //need collection and soldout form order table
        ->get();

        foreach ($event_details as $value) {
            
            $total_credit = DB::table('orders')->select('sold_amount')->where('event_id', $value->id)->get();
            foreach ($total_credit as $group144) {
                $total_credit_admin += $group144->sold_amount;
            }
        }

        return View('files.my_events',compact('event_details','total_credit_admin'));
    }

    public function show_event_form(){

        return View('files.add_event');
    }
    public function event_detail($event_id){

        try {
            $single_event = DB::table('events')
            ->where('id', $event_id)
            ->first();

            $single_event_tickets = DB::table('tickets')->where('event_id', $event_id)->get();

            $single_event_sponsor = DB::table('sponser')->where('event_id', $event_id)->where('user_id', Auth::user()->id)->get();

            return View('files.event_detail', compact('single_event', 'single_event_tickets', 'single_event_sponsor'));

        } catch (\Exception $th) {
            return redirect('/');
        }

        

        return View('files.event_detail', compact('single_event', 'single_event_tickets'));
    }

    public function create_event(EventRequest $request){

        if ($request->file('event_flyer') == null) {
            $upload_path = null;
            $upload_path2 = null;
        }else{
            $upload_path=EventImageUpload($request->file('event_flyer'),'event_flayer');
            $upload_path2=EventImageUpload($request->file('event_logo'),'event_logo');
        }

        $data= [
            'title' => $request->event_title,
            'start_date' => datetime_validate_24($request->start_time),
            'end_date' => datetime_validate_24($request->end_time),
            'image_path' => $upload_path,
            'event_logo' => $upload_path2,
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
        return redirect()->route('MyEvents')->with('flashMessageDanger',"You are not authorized to delete this event !");
     }
        
      


    }

    public function edit_event(EditEventRequest $request){

        if(!empty($request->event_flyer)){
            $upload_path=EventImageUpload($request->file('event_flyer'),'event_flayer');
        }else{
            $image=DB::table('events')->select('image_path')->where('id',$request->id)->first(); 
            $upload_path=$image->image_path;
        }

        if(!empty($request->event_logo)){
            $upload_path2=EventImageUpload($request->file('event_logo'),'event_logo');
        }else{
            $image=DB::table('events')->select('event_logo')->where('id',$request->id)->first(); 
            $upload_path2=$image->event_logo;
        }
        $data= [

            'title' => $request->event_title,
            'start_date' => datetime_validate_24($request->start_time),
            'end_date' => datetime_validate_24($request->end_time),
            'image_path' => $upload_path,
            'event_logo' => $upload_path2,
            'custom_link' => !empty($request->custom_link) ? $request->custom_link : NULL,
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
        $total_ticket_sold_dash = 0;
        $total_rev_dash = 0;
        $total_attendee_dash = 0;
        try {
            $event_details = DB::table('events')
            ->leftjoin('tickets','events.id','=','tickets.event_id')
            ->select('events.id','title','image_path','events.event_logo','start_date','end_date','country','address','city','state','zip','event_status','seat_number','category','hide_date_event_page','description','custom_link')
            ->where('events.id',$id)
            ->where('events.user_id',Auth::user()->id)
            ->first();

            $all_tickets = DB::table('tickets')
            ->where('event_id',$id)
            ->where('user_id',Auth::user()->id)
            ->get();

            $ticket_question = DB::table('custom_form')
            ->where('event_id',$id)
            ->where('user_id',Auth::user()->id)
            ->skip(3)
            ->take(100)
            ->get();
            if ($event_details == null) {
                return redirect('my-events');
            }
            $total_sponsor_dash = DB::table('sponser')->select('id')->where('event_id', $id)->count();
            $total_ticket_dash = DB::table('tickets')->select('id')->where('event_id', $id)->count();

            $total_ticket_sold1 = DB::table('orders')->select('sold_amount','sold_tickets','attende_confirm')->where('event_id', $id)->get();
            foreach ($total_ticket_sold1 as $group5) {
                $total_rev_dash += $group5->sold_amount;
                $total_ticket_sold_dash += $group5->sold_tickets;
                $total_attendee_dash += $group5->attende_confirm;
            }

            return view('eventsetup.event_sidebar',compact('event_details','all_tickets','ticket_question','total_rev_dash','total_ticket_sold_dash','total_attendee_dash','total_sponsor_dash','total_ticket_dash'));
        } catch (\Throwable $th) {
            return redirect('my-events');
        }

    }
    public function event_ticket($event_id)
    {
        $single_event = DB::table('events')->where('id', $event_id)->first();

        $single_event_tickets = DB::table('tickets')->where('event_id', $event_id)->get();

        return View('files.buy_ticket', compact('single_event', 'single_event_tickets'));
    }

    public function buy_ticket_option(Request $request)
    {
        $count = 0;
        $total_ticket_sold_count = 0;
        $single_event = DB::table('events')->where('id', $request->event_id)->first();

        $ticket_question = DB::table('custom_form')->where('event_id', $request->event_id)->orderBy('id', 'ASC')->get();

        $single_event_tickets = DB::table('tickets')->where('event_id', $request->event_id)->where('ticket_type', $request->ticket)->first();

        $ticket_count = DB::table('orders')->select('sold_tickets')->where('event_id', $request->event_id)->where('ticket_id', $single_event_tickets->id)->get();

        $total_ticket_sold = DB::table('orders')->select('sold_tickets')->where('event_id', $request->event_id)->get();

        foreach ($total_ticket_sold as $group2) {
            $total_ticket_sold_count += $group2->sold_tickets;
        }

        foreach ($ticket_count as $group) {
            $count += $group->sold_tickets;
        }

        if ($single_event_tickets->quantity <= $count) {
            $stock = true;
        }else{
            $stock = false;
        }

        $view =  view('files.buy_ticket_form',compact('single_event', 'single_event_tickets', 'ticket_question', 'stock', 'count','total_ticket_sold_count'))->render();

        return response()->json(['html'=>$view]);
    }

    public function order_form_select(Request $request)
    {
        $single_event_ticket = DB::table('custom_form')->where('event_id', $request->event_id)->where('select_specific_ticket', $request->ticket)->get();

        echo json_encode($single_event_ticket);
    }

    public function event_details_for_all($event_link)
    {
        $single_event = DB::table('events')->where('custom_link', $event_link)->first();

        if ($single_event == null) {

            $single_event = DB::table('events')->where('id', $event_link)->first();
        }

        try {
            $single_event = DB::table('events')
            ->where('id', $single_event->id)
            ->first();

            $single_event_tickets = DB::table('tickets')->where('event_id', $single_event->id)->get();

            $single_event_sponsor = DB::table('sponser')->where('event_id', $single_event->id)->get();

            return View('files.events', compact('single_event', 'single_event_tickets', 'single_event_sponsor'));

        } catch (\Exception $th) {
            return redirect('/');
        }
    }

    public function event_overview_admin($event_id)
    {
        return view('eventsetup.event_sidebar', compact('total_ticket_sold'));
    }
}

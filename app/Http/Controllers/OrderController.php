<?php

namespace App\Http\Controllers;

use Auth;
use App\Traits\Email;
use App\Mail\Ticket_Confirm_Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use Email;

    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
    }

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
    public function ticket_questoion_add(Request $request)
    {
        $validatedData = validator::make($request->all(),[
            // 'question_title' => 'required|string|unique:custom_form,question_title,'.$request->event_id,
            'tickets' => 'required'
        ]);
        if ($validatedData->passes()) {
        
        if (count($request->choices)) {
            $array2 = array();
            foreach ($request->choices as $key => $value) {
                $option = $request->choices[$key];
                array_push($array2,$option);
            }
            $choices = implode('~',$array2);
        }
        else{
            $choices = null;
        }

        foreach ($request->tickets as $key => $value) {
            $ticket_id = $request->tickets[$key];

            $data = [
                'question_title' => $request->question_title,
                'question_type' => $request->question_type,
                'question_instruction' => $request->instructions,
                'answer_required' => $request->required == 'on' ? 'on' : 'off',
                'select_specific_ticket' =>$ticket_id,
                'question_options' => $choices,
                'user_id' => Auth::user()->id,
                'event_id' => $request->event_id,
                'created_at' => date('Y-m-d h:i:s')
            ];

            $dataSet = DB::table('custom_form')->insert($data);   
        }


        if($dataSet==true) {
            return redirect('/event-setup/'.$request->event_id.'/order-form')->with('TicketQuestionSuccess','Ticket question added successfully !');
        } else {
            return redirect('/event-setup/'.$request->event_id.'/order-form')->with('TicketQuestionDanger','Ticket question add Error!');
        }
        
    }else{
        return redirect('/event-setup/'.$request->event_id.'/order-form')->withErrors($validatedData);
    }
    }
    public function ticket_toggle(Request $request)
    {

        $data = [
            'answer_required' => $request->flag=='true' ? 'on' : 'off'
        ];
        $dataSet = DB::table('custom_form')->where('id', $request->id)->update($data);
    }

    public function order_question_delete(Request $request){

        $data= DB::table('custom_form')->where('id',$request->id)->where('user_id',Auth::user()->id)->delete();
        if($data==true){
            echo true;
        }else{
            echo false;
        }   
    }

    public function ticket_update_html(Request $request){

        $ticket_question_details= DB::table('custom_form')
        ->where('id',$request->id)
        ->first();

        $all_tickets = DB::table('tickets')
        ->where('event_id',$request->event_id)
        ->where('user_id',Auth::user()->id)
        ->get();

        $view =  view('eventsetup.edit_ticket_question',compact('ticket_question_details', 'all_tickets'))->render();

        return response()->json(['html'=>$view]);
    }

    public function ticket_question_edit(Request $request)
    {
        $validatedData = $request->validate([
            'question_title' => 'required|string',
            'tickets' => 'required'
        ]);
        $array = array();
        foreach ($request->tickets as $key => $value) {
            $option = $request->tickets[$key];
            array_push($array,$option);
        }
        $tickets = implode('~',$array);
        if (count($request->choices)) {
            $array2 = array();
            foreach ($request->choices as $key => $value) {
                $option = $request->choices[$key];
                array_push($array2,$option);
            }
            $choices = implode('~',$array2);
        }
        else{
            $choices = null;
        }

        $data = [
            'question_title' => $request->question_title,
            'question_type' => $request->question_type,
            'question_instruction' => $request->instructions,
            'answer_required' => $request->required == 'on' ? 'on' : 'off',
            'select_specific_ticket' => $tickets,
            'question_options' => $choices,
            'updated_at' => date('Y-m-d h:i:s')
        ];

        try {
            $dataSet = DB::table('custom_form')->where('id', $request->question_id)->update($data);
            return redirect('/event-setup/'.$request->event_id.'/order-form')->with('TicketQuestionEditSuccess','Ticket question updated successfully !');
        } catch (\Exception $th) {
            return redirect('/event-setup/'.$request->event_id.'/order-form')->with('TicketQuestionEditDanger',$th->getMessage());
        }
    }



   public function get_name($trans_id,$type)
    {
        $answere = DB::table('questionanswer')->select('question_ans', 'question_title', 'created_at')->where('transaction_id', $trans_id)->get();
        foreach ($answere as $value) {
            if ($value->question_title == $type) {
            return $value->question_ans;
            }
        }
    }

    public function order_datatable_form(Request $request){

            $dataSet = DB::table("orders")
            ->select('id','transaction_id','created_at','order_confirm_id','sold_tickets','attende_confirm','ticket_id','status')
            ->where('orders.event_id', $request->event_id)
            ->orderBy('created_at', 'ASC')
            ->get();

            //$event_name = DB::table('events')->select('title')->where('id', $request->event_id)->first();

            $order_details=array();

            foreach($dataSet as $value){  
                $random_number = trim($value->order_confirm_id,"TG-");
                $set=[
                    'id'=>$value->id,
                    'order_confirm_id'=>$value->order_confirm_id,
                    'transaction_id'=>$value->transaction_id,
                    'Name'=>$this->get_name($value->transaction_id, "Name"),
                    'Email'=>$this->get_name($value->transaction_id, "Email"),
                    'Mobile'=>$this->get_name($value->transaction_id, "Mobile"),
                    'sold_tickets'=>$value->sold_tickets,
                    'order_date'=>$value->created_at,
                    'attende_confirm'=>$value->attende_confirm,
                    'ticket_id'=>$value->ticket_id,
                    'status'=>$value->status,
                    'random_number'=>$random_number,
                    //'event_title'=>$event_name->title,
                ];
                
                    array_push($order_details, $set);
            }
            echo json_encode($order_details);
    /* exit();
            
            $array2 = array();
            $array_final = array();
            for ($j=0; $j < count($array); $j++) { 

                for ($i=0; $i < count($dataSet) ; $i++) { 
                
                    if($dataSet[$i]->transaction_id == $array[$j]){

                        $data=[
                            'id'=>$dataSet[$i]->id,
                            $dataSet[$i]->question_title=>$dataSet[$i]->question_ans,
                            'transaction_id'=>$dataSet[$i]->transaction_id,
                            'sold_tickets'=>$dataSet[$i]->sold_tickets,
                        ];
                        array_push($array2,$data);
                    } 
                }  
                array_push($array_final,$array2);
                $array2 = array();

            }
            echo '<pre>'; 
            echo '======================<br>';
            print_r($array_final);
            echo '<br>======================';
            exit();
            
        echo json_encode($array_final); */
    }

    public function modal_view_order(Request $request)
    {
        $format = ('jS F Y g:i A');

        $answere = DB::table("questionanswer")
                ->select('question_ans', 'question_title', 'created_at','ticket_id')
                ->where('transaction_id', $request->tran_id)
                ->get();

                $order_details=(object)array();
                foreach($answere as $value){  
                  $key=$value->question_title;
                    $order_details->$key = $value->question_ans;
                }
                $created_at = 'Booked At';
                $ticket_type = 'Ticket Type';
                $order_details->$created_at = date($format, strtotime($value->created_at));

                $ticket_title = DB::table('tickets')->select('ticket_type')->where('id', $value->ticket_id)->first();
                $order_details->$ticket_type = $ticket_title->ticket_type;
                // $isSuccess  = $this->send_email('sifat.ezzyr@gmail.com', 'demo', 'demo');
                echo json_encode($order_details);
    }

    public function confirm_order_user(Request $request)
    {
        $data=[
            "attende_confirm" => $request->flag == 1 ? 1 : 0
        ];

        $dataSet = DB::table('orders')->where('transaction_id', $request->tran_id)->update($data);
        if($dataSet == true){
            echo true;
        }else{
            echo false;
        }
    }
    public function suspend_order_user(Request $request)
    {
        $data=[
            "status" => $request->flag == 0 ? 'active' : 'suspend'
        ];

        $dataSet = DB::table('orders')->where('transaction_id', $request->tran_id)->update($data);
        if($dataSet == true){
            echo true;
        }else{
            echo false;
        }
    }

    public function attendee_datatable_form(Request $request){

        $dataSet = DB::table("orders")
        ->select('id','transaction_id','created_at','order_confirm_id','sold_tickets','attende_confirm')
        ->where('orders.event_id', $request->event_id)
        ->where('orders.attende_confirm', 1)
        ->orderBy('created_at', 'ASC')
        ->get();
    
        $order_details=array();
    
        foreach($dataSet as $value){  
                    
            $set=[
                'id'=>$value->id,
                'order_confirm_id'=>$value->order_confirm_id,
                'transaction_id'=>$value->transaction_id,
                'Name'=>$this->get_name($value->transaction_id, "Name"),
                'Email'=>$this->get_name($value->transaction_id, "Email"),
                'Mobile'=>$this->get_name($value->transaction_id, "Mobile"),
                'sold_tickets'=>$value->sold_tickets,
                'order_date'=>$value->created_at,
                'attende_confirm'=>$value->attende_confirm,
            ];
                    
                array_push($order_details, $set);
        }
        echo json_encode($order_details);
    }

    public function qr_generate()
    {
        // $data = array(
        //     "email" => 'sifat.ezzyr@gmail.com',
        //     "subject" => "Ticket Purchase Confirmation",
        //     "event_title" => 'title',
        //     "tran_id" => 'tran_id',
        //     "event_id" => 'event_id',
        //     "ticket_id" => 'ticket_id',
        //     "random_number" => 'random_number',
        // );
        
        // Mail::to($data['email'])->send(new Ticket_Confirm_Mail($data));
        // try {
        //     $file = public_path('qr_codes/TG-005049.png');
        //     $code_save = \QRCode::text('TG-005049')->setOutfile($file)->png();
        // } catch (\Throwable $th) {
        //     echo $th->getMessage();
        // }
        $token = DB::table('password_resets')->select('token')->where('email', 'syedsifat02@gmail.com')->first();
            echo '<pre>'; 
            echo '======================<br>';
            print_r($token);
            echo '<br>======================';
            exit();
    }

    public function demo_example()
    {

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
        $event_details = (object)array(
            'event_logo' => null,
            'title' => 'sdsdsds',
            'seat_number' => '00',
        );
        return view('files.demo_exam', compact('total_credit_admin', 'event_details'));
    }

}
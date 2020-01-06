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
    public function ticket_questoion_add(Request $request)
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
            'user_id' => Auth::user()->id,
            'event_id' => $request->event_id,
            'created_at' => date('Y-m-d h:i:s')
        ];

        try {
            $dataSet = DB::table('custom_form')->insert($data);
            return redirect('/event-setup/'.$request->event_id.'/order-form')->with('TicketQuestionSuccess','Ticket question added successfully !');
        } catch (\Exception $th) {
            return redirect('/event-setup/'.$request->event_id.'/order-form')->with('TicketQuestionDanger',$th->getMessage());
        }
    }
    public function ticket_toggle(Request $request)
    {

        $data = [
            'answer_required' => $request->flag=='true' ? 'on' : 'off'
        ];
        $dataSet = DB::table('custom_form')->where('id', $request->id)->update($data);
    }

}

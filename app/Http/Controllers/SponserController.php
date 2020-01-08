<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Http\Requests\SponserRequest;

class SponserController extends Controller
{
   
    public function add_sponser(SponserRequest $request){

        $upload_path=EventImageUpload($request->file('sponser_logo'),'event_sponser');

        $data= [
            'sponser_name' => $request->sponser_name,
            'sponser_logo' => $upload_path,
            'event_id' =>$request->sponser_event_id,
            'user_id' => Auth::user()->id,
            'created_at'=>date('Y-m-d h:i:s')
        ];

        try {
            
            DB::table('sponser')->insert($data);
           
            return redirect('/event-setup/'.$request->sponser_event_id.'/sponser')->with('SponserAddSuccess','Your Sponser Added Successfully !');
    
            } catch (\Exception $th) {
                return redirect('/event-setup/'.$request->sponser_event_id.'/sponser')->with('SponserAddDanger',$th->getMessage());
            }

    }
    public function all_sponsers(Request $request){

        $dataSet = DB::table("sponser")
            ->where('user_id', Auth::id())
            ->where('event_id', $request->event_id)
            ->get();
        return Datatables::of($dataSet)->make(true);
    }

    public function sponser_delete(Request $request){

        $data= DB::table('sponser')->where('id',$request->id)->delete();
         
        if($data==true){
            echo true;
        }else{
            echo false;
        }   
    }
}

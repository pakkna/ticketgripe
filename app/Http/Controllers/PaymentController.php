<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\Ticket_Confirm_Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;




class PaymentController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
    }

    public function ticket_details($id){
        return DB::table('tickets')->select('ticket_type','ticket_price','quantity','fees_consume','selling_currency','fees_consume','event_id','user_id')->where('id',$id)->first();
    }

    public function ticket_generate(Request $request){
        
        // $validatedData = $request->validate([
        //     "question_ans" => "required",
        //     "question_ans" => Rule::unique('questionanswer')->where('question_title', 'Email')->where('ticket_id', $request->ticket_id),
        // ]);

        // $validatedData = validator::make($request->all(),[
        //     // 'question_ans' => 'required|unique:questionanswer,question_ans,Email,ticket_id,{$request->ticket_id}',
        //     // 'question_ans' => Rule::unique('questionanswer')->where('question_title', 'Email')->where('ticket_id', $request->ticket_id)
        //     // 'question_ans' => [
        //     //     'required',
        //     //     Rule::unique('questionanswer')->where(function ($query) {
        //     //         $query->where('ticket_id', 23);
        //     //     })
        //     // ],
        // ]);
        $check_same_email = DB::table('questionanswer')->where('question_title', 'Email')->where('ticket_id', $request->ticket_id)->where('question_ans', $request->Email)->get();

        if (count($check_same_email)) {
            return redirect()->back()->with("BuyTicketMessageDanger", "Email address already taken ! please try with another mail.");
        }else{
        
        $ticket_info=$this->ticket_details($request->ticket_id);

       // $total_ticket=$request->ticket_count;
        $total_price=($ticket_info->ticket_price*$request->ticket_count);
        $product_type=($ticket_info->ticket_type);

        //put buyer input info in session

        if($ticket_info->ticket_price>0){

            $names=array_keys($request->all());
            $values=array_values($request->all());

            $tran_id='TG-'.strtoupper(uniqid());

            for ($i=0; $i <count($names) ; $i++) { 
         
                $data=[

                    'request_name'=>$names[$i],
                    'request_value'=>$values[$i],
                    'event_id'=>$ticket_info->event_id,
                    'ticket_id'=>$request->ticket_id,
                    'transaction_id'=>$tran_id,
                    "created_at" =>date('Y-m-d h:i:s'),
                ];

                DB::table('before_order_table')->insert($data);

                }

            $this->pay_now_ssl($total_price,$product_type,$ticket_info->selling_currency,$request->all(),$tran_id,$ticket_info->event_id);
            }else{
                $this->order_confirm_without_ssl($request->all(),0,0,NULL,$ticket_info->event_id,$request->ticket_id,$ticket_info->user_id);
            }
        }
    }

    public function pay_now_ssl($pay_amount,$product_name,$currency,$buyer_info,$tran_id,$event_id)
    {


        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
            "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        /* PHP */
        $post_data = array();
        // $post_data['store_id'] = "innov5d88a62376485";
        // $post_data['store_passwd'] = "innov5d88a62376485@ssl";
        $post_data['store_id'] = "ticketgripelive";
        $post_data['store_passwd'] = "5E16FC35BA2B869168";
        $post_data['total_amount'] = $pay_amount;
        $post_data['currency'] = $currency;
        $post_data['tran_id'] = $tran_id;
        $post_data['success_url'] =  $link . "/payment_status?_token=" . csrf_token();
        $post_data['fail_url'] =  $link . "/payment_status?_token=" . csrf_token();
        $post_data['cancel_url'] = $link . "/payment_status?_token=" . csrf_token();

        # CUSTOMER INFORMATIONs
        $post_data['cus_name'] = $buyer_info['Name'];
        $post_data['cus_email'] = $buyer_info['Email'];
        $post_data['cus_add1'] = $buyer_info['address'];
        $post_data['cus_city'] = "Dhaka";
        $post_data['cus_state'] = "Dhaka";
        $post_data['cus_postcode'] = "4700";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $buyer_info['Mobile'];

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "ticketGripe.com";
        $post_data['ship_add1 '] = "BDBL Bhaban,12, Kazi Nazrul Islam Ave";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1215";
        $post_data['ship_country'] = "Bangladesh";
        $post_data['shipping_method'] = "NO";

        $post_data['value_a'] = $buyer_info['_token'];
        $post_data['value_b'] = $event_id;

        # CART PARAMETERS
        $post_data['cart'] = json_encode(array(
            array("product" => $product_name, "amount" => $pay_amount)
        ));
        $post_data['product_amount'] = $pay_amount;
        $post_data['product_name'] = $product_name;
        $post_data['product_category'] = "event Ticket";
        $post_data['vat'] = 0;
        $post_data['discount_amount'] = 0;
        $post_data['convenience_fee'] = 0;


        // $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
        $direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v4/api.php";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($code == 200 && !(curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close($handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        # PARSE THE JSON RESPONSE

        $sslcz = json_decode($sslcommerzResponse, true);

        if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
            # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            echo "JSON Data parsing error!";
        }
    }

    public function payment_status(Request $request)
    {
        $bill_info=DB::table('before_order_table')->where('transaction_id',$request->tran_id)->get();

        if($request->card_type== "VALID" || "VALIDED" && $bill_info[0]->request_value==$request->value_a &&  $request->status != "FAILED" &&  $request->status != "CANCELLED"){
               
                $data = [
                    "product" => "Event Ticket",
                    "total_tickets" =>$bill_info[2]->request_value,
                    "card_type" => $request->card_type,
                    "tran_id" =>  $request->tran_id,
                    "val_id" => $request->val_id,
                    "total_amount" => $request->amount,
                    "store_amount" => $request->store_amount,
                    "bank_tran_id" => $request->bank_tran_id,
                    "card_no" => !empty($request->card_no) ? $request->card_no : 'none',
                    "card_issuer" => $request->card_issuer,
                    "card_brand" => !empty($request->card_brand) ? $request->card_brand : 'none',
                    "currency" =>$request->currency,
                    "currency_rate" =>$request->currency_rate,
                    "card_issuer_country" => $request->card_issuer_country,
                    "user_id" => Auth::id(),
                    "ticket_id" =>$bill_info[1]->request_value,
                    "event_id" =>$request->value_b,
                    "tran_date" => $request->tran_date,
                ];

                $payment_id= DB::table('payment')->insertGetId($data);

                if($payment_id>0){
                    $this->order_confirm($bill_info,$request->amount,$request->store_amount,$payment_id,$request->value_b);
                }
               
            }else{
                return redirect("buy-ticket/{$request->value_b}")->with("flashMessageSuccess", "Online Payment System Request Invalid ! Try Again");
            }      
    }

    public function order_confirm($bill_info,$total_amount,$store_amount,$payment_id,$event_id){

        //$ticket_info=$this->ticket_details($bill_info->ticket_id);
        $user_id = DB::table('events')->select('user_id')->where('id', $event_id)->first();
        $user_info = User::where('id', $user_id->user_id)->firstOrFail();

        $random_number = mt_rand(100000, 999999);

           if($total_amount>0) {
            $ssl_charge=($total_amount-$store_amount);
           }else{
            $ssl_charge=0;
            $total_amount = 0;
           }   

        $parcentage= (($total_amount*5)/100);
        $system_charged=$parcentage-$ssl_charge;

        $array_cut=$bill_info->toArray();
        $request_array=array_splice($array_cut,3,count($array_cut));

        $data = [
            "order_confirm_id" => "TG-".$random_number,
            "sold_tickets" => $bill_info[2]->request_value,
            "order_amount" =>  $total_amount,
            "ssl_charge" => $ssl_charge,
            "system_charge" =>$system_charged,
            "sold_amount" => ($store_amount-$system_charged),
            "payment_id" =>$payment_id,
            "user_id" => $user_id->user_id,
            "ticket_id" =>$bill_info[1]->request_value,
            "event_id" =>$event_id,
            'transaction_id'=>$request_array[0]->transaction_id,
            "created_at" =>date('Y-m-d H:i:s'),
        ];
        $user_balance = $user_info->balance + ($store_amount-$system_charged);

        $data = DB::table('orders')->insert($data);
        $data2 = DB::table('users')->where('id', $user_id->user_id)->update(['balance' => $user_balance]);

        if($data==true && $data2==true){

            for ($i=0; $i <count($request_array) ; $i++) { 
         
                $answer_set=[

                    'question_title'=>$request_array[$i]->request_name,
                    'question_ans'=>$request_array[$i]->request_value,
                    'transaction_id'=>$request_array[$i]->transaction_id,
                    'event_id'=>$request_array[$i]->event_id,
                    'ticket_id'=>$request_array[$i]->ticket_id,
                    "created_at" =>date('Y-m-d H:i:s'),
                ];
                DB::table('questionanswer')->insert($answer_set);

            }

            $file = public_path('qr_codes/TG-'.$random_number.'.png');
            $code_save = \QRCode::text('TG-'.$random_number)->setOutfile($file)->png();

            $event_name = DB::table('events')->select('title')->where('id', $event_id)->first();

            $data = array(
                "email" => $request_array[1]->request_value,
                "name" => $request_array[0]->request_value,
                "subject" => "Ticket Purchase Confirmation",
                "event_title" => $event_name->title,
                "tran_id" => $request_array[0]->transaction_id,
                "event_id" => $event_id,
                "ticket_id" => $request_array[0]->ticket_id,
                "random_number" => $random_number,
            );
    
            Mail::to($data['email'])->send(new Ticket_Confirm_Mail($data));

        }

        //create ticket page

        echo "<meta http-equiv='refresh' content='0;url=ticket-view/".$request_array[0]->transaction_id."/".$event_id."/".$request_array[0]->ticket_id . "/".$random_number."'>";        

        
    }
    public function order_confirm_without_ssl($bill_info,$total_amount,$store_amount,$payment_id,$event_id,$ticket_id,$user_id){

        //$ticket_info=$this->ticket_details($bill_info->ticket_id);

        $random_number = mt_rand(100000, 999999);

            $ssl_charge=0;
            $total_amount = 0; 

        $parcentage= (($total_amount*5)/100);
        $system_charged=$parcentage-$ssl_charge;
        $tran_id='TG-'.strtoupper(uniqid());


        $data = [
            "order_confirm_id" => "TG-".$random_number,
            "sold_tickets" => $bill_info['ticket_count'],
            "order_amount" =>  $total_amount,
            "ssl_charge" => $ssl_charge,
            "system_charge" =>$system_charged,
            "sold_amount" => ($store_amount-$system_charged),
            "payment_id" =>$payment_id,
            "user_id" => $user_id,
            "ticket_id" =>$bill_info['ticket_id'],
            "event_id" =>$event_id,
            'transaction_id'=>$tran_id,
            "created_at" =>date('Y-m-d H:i:s'),
        ];
        $request_array=array_slice($bill_info,3);
        $names=array_keys($request_array);
        $values=array_values($request_array);

        $data = DB::table('orders')->insert($data);

        // $array_cut=$bill_info->toArray();

        if($data==true){

            for ($i=0; $i <count($request_array) ; $i++) { 
         
                $answer_set=[

                    'question_title'=>$names[$i],
                    'question_ans'=>$values[$i],
                    'transaction_id'=>$tran_id,
                    'event_id'=>$event_id,
                    'ticket_id'=>$ticket_id,
                    "created_at" =>date('Y-m-d H:i:s'),
                ];
                DB::table('questionanswer')->insert($answer_set);

            }

            $file = public_path('qr_codes/TG-'.$random_number.'.png');
            $code_save = \QRCode::text('TG-'.$random_number)->setOutfile($file)->png();

            $event_name = DB::table('events')->select('title')->where('id', $event_id)->first();

            $data = array(
                "email" => $request_array['Email'],
                "name" => $request_array['Name'],
                "subject" => "Ticket Purchase Confirmation",
                "event_title" => $event_name->title,
                "tran_id" => $tran_id,
                "event_id" => $event_id,
                "ticket_id" => $ticket_id,
                "random_number" => $random_number,
            );
        
            Mail::to($data['email'])->send(new Ticket_Confirm_Mail($data));

        }

        //create ticket page

        echo "<meta http-equiv='refresh' content='0;url=ticket-view/".$tran_id."/".$event_id."/".$ticket_id . "/".$random_number."'>";        

        
    }

    public function ticket_view($tran_id,$event_id,$ticket_id,$random_number)
    {

        $event_info = DB::table('events')->select('title','start_date','end_date','address','city','state','zip','country','event_logo')->where('id', $event_id)->first();

        $sponsor_info = DB::table('sponser')->select('sponser_logo')->where('event_id', $event_id)->get();

        $buyer_info = DB::table('questionanswer')->select('transaction_id','question_ans','created_at','question_title')->where('transaction_id', $tran_id)->take(3)->get();

        $ticket_type = DB::table('tickets')->select('ticket_type')->where('id', $ticket_id)->first();

        return view('files.ticket', compact('event_info', 'sponsor_info', 'buyer_info', 'random_number', 'ticket_type'));

    }
}

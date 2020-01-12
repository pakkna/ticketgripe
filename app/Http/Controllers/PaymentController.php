<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PaymentController extends Controller
{

    public function ticket_details($id){
        return DB::table('tickets')->select('ticket_type','ticket_price','quantity','fees_consume','selling_currency','fees_consume','event_id')->where('id',$id)->first();
    }

    public function ticket_generate(Request $request){

        $ticket_info=$this->ticket_details($request->ticket_id);

       // $total_ticket=$request->ticket_count;
        $total_price=($ticket_info->ticket_price*$request->ticket_count);
        $product_type=($ticket_info->ticket_type);

        //put buyer input infi in session
        $request->session()->put('buyer_info',$request->all());

        if($ticket_info->ticket_price>0){
            $this->pay_now_ssl($total_price,$product_type,$ticket_info->selling_currency,$request->all());
        }else{
            $this->order_confirm($request->all(),0,0,NULL);
        }
    }

    public function pay_now_ssl($pay_amount,$product_name,$currency,$buyer_info)
    {


        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
            "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        /* PHP */
        $post_data = array();
        $post_data['store_id'] = "innov5d88a62376485";
        $post_data['store_passwd'] = "innov5d88a62376485@ssl";
        $post_data['total_amount'] = $pay_amount;
        $post_data['currency'] = $currency;
        $post_data['tran_id'] = 'TGRIPE-'.strtoupper(uniqid());
        $post_data['success_url'] =  $link . "/payment_status?_token=" . csrf_token();
        $post_data['fail_url'] =  $link . "/payment_status?_token=" . csrf_token();
        $post_data['cancel_url'] = $link . "/payment_status?_token=" . csrf_token();

        # CUSTOMER INFORMATIONs
        $post_data['cus_name'] = $buyer_info['fullname'];
        $post_data['cus_email'] = $buyer_info['email'];
        $post_data['cus_add1'] = $buyer_info['address'];
        $post_data['cus_city'] = "Dhaka";
        $post_data['cus_state'] = "Dhaka";
        $post_data['cus_postcode'] = "4700";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $buyer_info['mobile'];

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "ticketGripe.com";
        $post_data['ship_add1 '] = "BDBL Bhaban,12, Kazi Nazrul Islam Ave";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1215";
        $post_data['ship_country'] = "Bangladesh";
        $post_data['shipping_method'] = "NO";

        $post_data['value_a'] = $buyer_info['_token'];

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


        $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

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

        $bill_info=$request->session()->get('buyer_info');

        $ticket_info=$this->ticket_details($bill_info['ticket_id']);

       // $request->session()->forget('buyer_info');

        if($request->card_type== "VALID" || "VALIDED" && $bill_info['_token']==$request->value_a ){
               
                $data = [
                    "product" => "Event Ticket",
                    "total_tickets" =>$bill_info['ticket_count'],
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
                    "ticket_id" =>$bill_info['ticket_id'],
                    "event_id" =>$ticket_info->event_id,
                    "tran_date" => $request->tran_date,
                ];

                $payment_id= DB::table('payment')->insertGetId($data);

                if($payment_id>0){
                    $this->order_confirm($bill_info,$request->amount,$request->store_amount,$payment_id);
                }
               
            }else{
                return redirect("buy-ticket/{{$bill_info['ticket_id']}}")->with("flashMessageSuccess", "Online Payment System Request Invalid ! Try Again");
            }      
    }


    public function order_confirm($bill_info,$total_amount,$store_amount,$payment_id){

        $ticket_info=$this->ticket_details($bill_info['ticket_id']);

        $random_number = mt_rand(1000, 9999);

           if($total_amount>0) {
            $ssl_charge=($total_amount-$store_amount);
           }else{
            $ssl_charge=0;
           }   

        $parcentage= (($total_amount*10)/100);
        $system_charged=$parcentage-$ssl_charge;

        $data = [
            "order_confirm_id" => "TGripe-".$ticket_info->event_id.$bill_info['ticket_id'].'-'.$random_number,
            "sold_tickets" => $bill_info['ticket_count'],
            "order_amount" =>  $total_amount,
            "ssl_charge" => $ssl_charge,
            "system_charge" =>$system_charged,
            "sold_amount" => ($store_amount-$system_charged),
            "payment_id" =>$payment_id,
            "user_id" => Auth::id(),
            "ticket_id" =>$bill_info['ticket_id'],
            "event_id" =>$ticket_info->event_id,
            "created_at" =>date('Y-m-d h:i:s'),
        ];

        $data = DB::table('orders')->insert($data);

        echo "#ordered Successfully";

        echo '<pre>'; 
        echo '======================<br>';
        print_r($bill_info);
        echo '<br>======================';
        exit();
        //next question ans save function
    }
}
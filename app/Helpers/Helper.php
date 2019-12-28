<?php



use Illuminate\Support\Facades\DB;

date_default_timezone_set('Asia/Dhaka');

if (!function_exists('datetime_validate')) {

    function datetime_validate($date, $format = ('Y-m-d h:i:s'))

    {

        return date($format, strtotime($date));

    }

}

if (!function_exists('date_validate')) {

    function date_validate($date, $format = ('Y-m-d'))

    {

        return date($format, strtotime($date));
    }
}

if (!function_exists('datetime_output')) {

    function datetime_output($date, $format = ('"jS F Y g:i A"'))

    {

        return date($format, strtotime($date));
    }
}

if (!function_exists('javascript_dateformate')) {

    function javascript_dateformate($date, $format = ('m/d/Y h:i:s A'))

    {

        return date($format, strtotime($date));
    }
}



if (!function_exists('get_order_data')) {

    function get_order_data()

    {

        return DB::table("ordered")

            ->join('domains', 'domains.id', '=', 'ordered.domain_id')

            ->select("ordered.*","domains.price")

            ->orderBy('created_at', 'DESC')->get();

    }

}

if (!function_exists('get_user_details')) {

    function get_user_details($id)

    {
        return DB::table("users")->where('id',$id)->first();
    }
}

if (!function_exists('sms_send_function')) {

    function sms_send_function($number,$message)

    {

        $data = array('api_key' => 'R60000545db178e00b7066.63170959', 'type' => 'text', 'contacts' => $number, 'senderid' => 'eSMS', 'msg' => $message);

        $string = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://esms.dianahost.com/smsapi');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $string);


        $content = curl_exec($ch);

        $reg = 'SMS SUBMITTED: ID';

        $array = (explode(" - ", $content));

        if (strpos($reg, $array[0]) !== false) {
          return true;
         }

        curl_close($ch);
    }
}

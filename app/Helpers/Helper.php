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


if (!function_exists('get_user_details')) {

    function get_user_details($id)

    {
        return DB::table("users")->where('id',$id)->first();
    }
}

if (!function_exists('FileUpload')) {

    function FileUpload($image,$uploadpath){

        $datetime =date('Ymd_His');
        $file=$image->file('file');
        $filename= $datetime.'-'. $file->getClientOriginalName();
        $save_path= public_path($uploadpath);
        $file->move($save_path,$filename);
        return $uploadpath;
    }
}

if (!function_exists('EventImageUpload')) {

    function EventImageUpload($file,$uploadpath){

        $datetime =date('Ymd_His');
            $filename= $datetime.'-'. $file->getClientOriginalName();
            $save_path= public_path($uploadpath);
            $file->move($save_path,$filename);
            return $uploadpath."/".$filename;        
    }
}

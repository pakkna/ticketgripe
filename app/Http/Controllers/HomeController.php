<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
        public function All_clear(){
            $exitCode1 = Artisan::call('cache:clear');
            $exitCode2 = Artisan::call('route:clear');
            $exitCode3 = Artisan::call('config:clear');
            $exitCode1 = Artisan::call('cache:clear');
            $exitCode1 = Artisan::call('view:clear');
            return redirect('/my-events');
        }
    public function demo_view()
    {
        return View('files.demo');
    }
    public function index()
    {
        return View('files.index');
    }
    public function login()
    {
        return View('files.login');
    }
    public function register()
    {
        return View('files.register');
    }
    public function user_setting()
    {
        return View('files.user_dashboard');
    }
    public function edit_basic_info(Request $request)
    {
        $validatedData = $request->validate([
            "fullname" => "required|string",
            "mobile" => "nullable|numeric",
            "country" => "nullable|string",
            "organaization" => "nullable|string",
        ]);
        $data=[
            'fullname' => $request->fullname,
            'mobile' => $request->mobile,
            'country' => $request->country,
            'organization' => $request->organaization
        ];
        try {
            $dataSet = DB::table('users')->where('id', Auth::user()->id)->update($data);
            return redirect()->route('UserSetting')->with('UserinfoSuccess','Information updated succeessfully !');
        } catch (\Exception $th) {
            return redirect()->route('UserSetting')->with('userinfoDanger',$th->getMessage());
        }
    }
    public function edit_user_avatar(Request $request)
    {
        $validatedData = $request->validate([
            "avatar" => "nullable|mimes:jpeg,bmp,png",
            "avatar_bg" => "nullable|mimes:jpeg,bmp,png|dimensions:width=1280,height=518",
        ]);

        if (!empty($request->avatar)) {
            $upload_path1=EventImageUpload($request->file('avatar'),'profile_pic');
        }else{
            $upload_path1 = DB::table('users')->select('image')->where('id', Auth::user()->id)->first();
            $upload_path1=$upload_path1->image;
        }
        if (!empty($request->avatar_bg)) {
            $upload_path2=EventImageUpload($request->file('avatar_bg'),'profile_cover');
        }else{
            $upload_path2 = DB::table('users')->select('cover_pic')->where('id', Auth::user()->id)->first();
            $upload_path2=$upload_path2->cover_pic;
        }

        $data=[
            'image' => $upload_path1,
            'cover_pic' => $upload_path2,
        ];
        try {
            $dataSet = DB::table('users')->where('id', Auth::user()->id)->update($data);
            return redirect('user-setting/profile')->with('UseravatarSuccess','Information updated succeessfully !');
        } catch (\Exception $th) {
            return redirect('user-setting/profile')->with('UseravatarDanger',$th->getMessage());
        }
    }
    public function edit_user_email(Request $request)
    {
        $validatedData = $request->validate([
            "email" => "required|email|unique:users",
        ]);
        $old_email = DB::table('users')->select('email')->where('id', Auth::user()->id)->first();

        if ($old_email->email == $request->old_email) {
            try {
                $dataSet = DB::table('users')->where('id', Auth::user()->id)->update(['email'=> $request->email]);
                return redirect('user-setting/email')->with('UseremailSuccess','Information updated succeessfully !');
            } catch (\Exception $th) {
                return redirect('user-setting/email')->with('UseremailDanger',$th->getMessage());
            }
        }else{
            return redirect('user-setting/email')->with('UseremailDanger','Old email address is invalid !');
        }
    }
    public function edit_user_pass(Request $request)
    {
        $user_credentials = array('email'=> Auth::user()->email,'password' => $request->old_pass);

        if (Auth::attempt($user_credentials)) {
     
            try {
                DB::table('users')->where('id', Auth::user()->id)->update(['password' => bcrypt($request->pass)]);
                return redirect('user-setting/passsword')->with('UserpassSuccess', 'Password Updated Succesfully ! Now login With New Password.'); 
            } catch (\Exception $th) {
                return redirect('user-setting/passsword')->with('UserpassDanger', $th->getMessage()); 
            }
        
        }else{
            return redirect('user-setting/passsword')->with('UserpassDanger',"Old password is not matched !"); 
        }
    }
}

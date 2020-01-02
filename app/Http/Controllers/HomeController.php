<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
            return redirect()->route('UserSetting')->with('flashMessageSuccess','Information updated succeessfully !');
        } catch (\Exception $th) {
            return redirect()->route('UserSetting')->with('flashMessageDanger',$th->getMessage());
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
            return redirect('user-setting/profile')->with('flashMessageSuccess','Information updated succeessfully !');
        } catch (\Exception $th) {
            return redirect('user-setting/profile')->with('flashMessageDanger',$th->getMessage());
        }
    }
}

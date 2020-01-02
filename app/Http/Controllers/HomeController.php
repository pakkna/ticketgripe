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
            "avatar_img" => "nullable|mimes:jpeg,bmp,png",
            "avatar_bg" => "nullable|mimes:jpeg,bmp,png|dimensions:width=1280,height=518",
        ]);
        $upload_path=EventImageUpload($request->file('event_flyer'),'event_flayer');

        $data=[
            'avatar_img' => $request->fullname,
            'avatar_bg' => $request->mobile,
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
}

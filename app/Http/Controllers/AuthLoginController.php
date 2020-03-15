<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AuthLoginRequest;
use session;

class AuthLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.adduser');
    }

    public function register(RegisterRequest $request){

        $data = [

            "username" => $request->username,

            "email" => $request->email,

            "fullname" => $request->fullname,
          
            "password" => bcrypt($request->password),

            "user_type" => 'user',

            "status" => '1',

            "created_at" => date('Y-m-d h:i:s')

        ];


        try {
            DB::table('users')->insert($data);
            return redirect()->route('login')->with("flashMessageSuccess", "Your Account Created Successfully ! ");

        } catch (\Exception $e) {
            return  redirect()->route('sign-up')->with("flashMessageDanger", $e->getMessage());
            
        }
 
    }

    public function login(AuthLoginRequest $request)
    {
        $request->request->add(['email' =>  $request->username]);
        $request->request->add(['def_password' =>  $request->password]);

        $credentials1 = $request->only('username','password');
        $credentials2 = $request->only('email','password');

        // $match = DB::table('users')->select('id')->where('def_password', bcrypt($request->password))->first();
        $credentials3 = $request->only('email','def_password');

        if (Auth::attempt($credentials1) || Auth::attempt($credentials2) || Auth::attempt($credentials3)) {
            if (Auth::user()->status != 1) {
                \Session::flush();
                Auth::logout();
                return redirect("sign-in")->with("flashMessageDanger", "Account is suspended !");
            }else{
                return redirect()->route("MyEvents"); 
            }
        } else {
            return redirect("sign-in")->with("flashMessageDanger", "Invalid User Credentials.");
        }
    }

    public function logout()
    {
        if(Auth::user()->user_type=="Super Admin" || Auth::user()->user_type == "Admin" ){
            \Session::flush();
            Auth::logout();
            return redirect("tgadmin")->with("flashMessageSuccess", "Logout Succesfully");
           
        }else if(Auth::user()->user_type == "user"){
            \Session::flush();
            Auth::logout();
            return redirect("sign-in")->with("flashMessageSuccess", "Logout Succesfully");
        }
        Auth::logout();
        return redirect("sign-in")->with("flashMessageSuccess", "Logout Succesfully");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|unique:users|max:255',
            'name' => 'required|max:255',
            'image' => 'required|image',
            'mobile' => 'required',
            'password' => 'required|min:6',
        ]);


        $image = $request->file('image');

        $input['image_name'] = time() . '.' . $image->getClientOriginalExtension();

        $destination_path = public_path('/assets/images/avatars');

        $image->move($destination_path, $input['image_name']);


        $data = [

            "name" => $request->name,

            "email" => $request->email,

            "image" => $input['image_name'],

            "mobile" => $request->mobile,

            "password" => bcrypt($request->password),

            "user_type" => 'Admin',

            "status" => '0',

            "created_at" => date('Y-m-d H:i:s')

        ];

        $dataSet = DB::table('users')->insert($data);


        if ($dataSet == true) {

            return redirect("adduser")->with("flashMessageSuccess", "New User Added Successfully");
        } else {

            return redirect("adduser")->with("flashMessageDanger", "Have Some Problem To Add !");
        }
    }

    public function show()
    {
        return view('auth.profile');
    }


    public function edit(Request $request)
    {


        $data = DB::table('users')->select('image', 'password')->where('id', $request->id)->first();

        if (!empty($request->image)) {

            $image = $request->file('image');

            $input['image_name'] = time() . '.' . $image->getClientOriginalExtension();

            $destination_path = public_path('/assets/images/avatars');

            $image->move($destination_path, $input['image_name']);
        } else {
            $input['image_name'] = $data->image;
        }

        if (!empty($request->password)) {
            $pass = bcrypt($request->password);
        } else {
            $pass = $data->password;
        }


        $data = [

            "name" => $request->name,

            "email" => $request->email,

            "image" => $input['image_name'],

            "resident_name" => $request->resident_name,

            "password" => $pass,

            "updated_at" => date('Y-m-d H:i:s')

        ];


        try {

            DB::table('users')->where('id', $request->id)->update($data);
            return redirect("edit-profile")->with("flashMessageSuccess", "Profile Changed Successfully");

        } catch (\Illuminate\Database\QueryException $e) {

            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect("edit-profile")->with("flashMessageDanger", "User Name Already Exists ! Try Another One.");
            }
        }
    
    }

    public function user_list()
    {
        $user_list = DB::table('users')->where('user_type', '!=', 'Super Admin')->where('user_type', '!=', 'seller')->where('user_type', '!=', 'buyer')->get();
        return view('auth.user_list', compact('user_list'));
    }


    public function modify($id)
    {

        $data = DB::table('users')->where('id', $id)->first();

        return view('auth.modify_user', compact('data'));
    }

    public function save_modify_data(Request $request)
    {


        $data = DB::table('users')->select('image', 'password')->where('id', $request->id)->first();

        if (!empty($request->image)) {
            $image = $request->file('image');

            $input['image_name'] = time() . '.' . $image->getClientOriginalExtension();

            $destination_path = public_path('/assets/images/avatars');

            $image->move($destination_path, $input['image_name']);
        } else {
            $input['image_name'] = $data->image;
        }

        if (!empty($request->password)) {
            $pass = bcrypt($request->password);
        } else {
            $pass = $data->password;
        }


        $data = [

            "name" => $request->name,


            "image" => $input['image_name'],

            "mobile" => $request->mobile,

            "password" => $pass,

            "sitemap" => $request->sitemap,

            "media_center" => $request->media_center,

            "student_forum" => $request->student_forum,

            "nasa_app" => $request->nasa_app,

            "user_management" => $request->user_management,

            "updated_at" => date('Y-m-d H:i:s')

        ];


        $dataSet = DB::table('users')->where('id', $request->id)->update($data);


        if ($dataSet == true) {

            return redirect("modify-user-data/$request->id")->with("flashMessageSuccess", "User Data Updated Successfully");
        } else {

            return redirect("modify-user-data/$request->id")->with("flashMessageDanger", "Have Some Problem To Add !");
        }
    }

    public function destroy($id = null)
    {
        $dataSet =  DB::table('users')->where('id', $id)->delete();


        if ($dataSet == true) {

            return redirect("user-list");
        } else {

            return redirect("user-list");
        }
    }

    public function showResetForm($token)
    {
        $email = DB::table('password_resets')->select('email')->where('token', $token)->first();
        if($email == true){
            return view('auth.resetpass',compact('token'));
        }else{
            return redirect()->route("login")->with("flashMessageDanger", "Invalid token !");
        }
    }

    public function reset_pass_post(Request $request)
    {
        $request->validate([
            'new_pass' => 'required',
            'confirm_pass' => ['same:new_pass'],
        ]);

        $new_pass = bcrypt($request->confirm_pass);
        try {
            $token = Str::random(60);
            $email = DB::table('users')->where('token', $request->token)->update(['password' => $new_pass, 'token' => $token]);
            $token_update = DB::table('password_resets')->where('token', $request->token)->update(['token' => $token]);
            return redirect()->route("login")->with("flashMessageSuccess", "Password changed !");
        } catch (\Throwable $th) {
            return redirect()->route("login")->with("flashMessageDanger", "Error ! Please try again.");
        }
    }

    public function admin_login_form()
    {
        return view('auth.auth_login');
    }

    public function admin_login_post(Request $request)
    {
        $validatedData = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        $Admin_credentials = array('email' => $request->email, 'password' => $request->password, "user_type" => "Admin");

        if (Auth::attempt($Admin_credentials)) {
            return redirect()->route('dashboard');
        } else {
        return redirect()->back()->with("flashMessageDanger", "Invalid User Credentials.");
        }
    }
}

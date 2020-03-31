<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Referral;
use Illuminate\Support\Facades\Validator;
use App\Models\UserTrans;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use DB;



class UserController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    // ALTER TABLE `users` ADD `avatar` VARCHAR(255) NULL DEFAULT NULL AFTER `remember_token`;

    public function index(){
        return view('home.home_page');
    }


    function update_bio(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
           //  'email'     => 'required|unique:users',
            'email' => [
                'required',
                Rule::unique('users')->ignore(auth()->user()->id),
            ]
           // 'message'  => 'required|min:20'
        ]);

        if ($validator->fails()) {
            return response()->json(array('status'=>false, 'message' => $validator->errors()->first()));
        }

        $user = User::find(auth()->user()->id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        return response()->json(array( 'status'=> true, 'message' => 'Successfully updated!' ));
    }


    function avatar_update(Request $request){
        $user           = User::find(auth()->user()->id);
        $user->avatar     = $request->get('avatar');
        $user->save();
        return response()->json(array( 'status'=> true, 'message' => 'Successfully updated!' ));
    }


    function change_password(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password'      => 'required',
            'password'          => 'required|min:8',
            'confirm_password'  => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false, 'message' => $validator->errors()->first()));
        }
        $userRow = DB::table('users')->where('id',auth()->user()->id)->first();
        if( !(Hash::check($request->get('old_password'), $userRow->password)) ){
            return response()->json(array('status'=>false, 'message' => 'Old Password is not match!' ));
        }
        $password = Hash::make($request->get('password'));
        DB::table('users')->update(['password' => $password])->where('id',auth()->user()->id);
        return response()->json(array( 'status'=> true, 'message' => 'Password successfully updated!' ));
    }







    function contact_us_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'message'  => 'required|min:20'
        ]);
        if ($validator->fails()) {
            return redirect('contact-us')
                ->withErrors($validator)
                ->withInput();
        }
        $body = $name.' '.$email.' '.$message;
        mail('ahmedshabbirawan@gmail.com','Message from Web',$body);
        echo "<h3>Thanks for contact us!</h3>";
    }




}

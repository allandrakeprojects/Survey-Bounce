<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','custom_login','custom_logout']);
    }

    public function username(){
        return 'username';
    }


    public function custom_logout(){
        Auth::logout();
        return redirect('/login');
    }




    public function custom_login(Request $request){

        // print_r($request->all()); exit;

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => false,'data'=> [], 'message' => $validator->errors()->first()));
        }
        $credentials = $request->only('username', 'password');
        // $credentials
        if (Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password') ])) {
            // Authentication passed...
            // return redirect()->intended('dashboard');
            return response()->json(array('status' => true,'data'=> [], 'message' => 'Login Successfully!'));
        }else{
            return response()->json(array('status' => false,'data'=> [], 'message' => 'Wrong Username and Password!' ));
        }
    }



}

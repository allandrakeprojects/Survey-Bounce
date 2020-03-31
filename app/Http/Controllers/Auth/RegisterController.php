<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Referral;
use App\Models\UserTrans;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    function sign_up($username = '', Request $request){
        if($username != ''){
            $ref_user  = User::where('username',$username)->first();
            if($ref_user){
                $refArr['refID']        = $ref_user->id;
                $refArr['refUsername']  = $ref_user->username;
                session(['ref' => $refArr]);
            }
        }
       //  print_r(session('ref')['refUsername']);



        return view('auth.register');
    }



    public function custom_register(Request $request){
        $validator = Validator::make($request->all(), [
            'username'  => 'required|unique:users',
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|min:8',
            'confirmPassword' => 'required|same:password',
            'terms'    => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => false,'data'=> [], 'message' => $validator->errors()->first()));
        }

        $insertArr              = $request->only('username', 'password','email','name');
        $insertArr['password']  = Hash::make($request->password);
        $user                   = User::create($insertArr);


        UserTrans::create([
            'user_id'   => $user->id,
                'amount'    => 5,
                'purpose'   => 'user_account_create',
                'title'     => 'Create Account',
                'description'   => 'You have create account with the referral',
                'extra'         => ( ( isset(session('ref')['refID']))? 'Referral ID is '.session('ref')['refID'] : '' )
            ]);

        if(isset(session('ref')['refID'])){
            Referral::create([
                'referral'          => $user->id,
                'referral_by'       => session('ref')['refID'],
                'referral_amount'   => 5,
                'status'            => 'complete'
            ]);

            UserTrans::create([
                'user_id'   => session('ref')['refID'],
                'amount'    => 10,
                'purpose'   => 'refer_user',
                'title'     => 'Refer User',
                'description'   => 'You have refer the User',
                'extra'         => 'Referral ID is '.$user->id
            ]);
            session('ref')['refID'];
            $request->session()->forget('ref');
        }




        return response()->json(array('status' => true,'data'=> [], 'message' => 'Your account has been created!' ));
    }


}

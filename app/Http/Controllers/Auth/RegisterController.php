<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Verification;
use App\Mail\VerificationMail;
use Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
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
    
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data) {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255',],
            'last_name' => ['required', 'string', 'max:255',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    protected function create(array $data) {
        $user= User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);

        $verify = Verification::create([
            'token' => Str::random(40),
            'user_id' => $user->id
            
        ]);

        Mail::to($user->email)->send(new VerificationMail($user));
        return $user;
    }

    public function verification($token) {
        $verify = Verification::where('token', $token)->first();
        if(isset($verify)){
            $user = $verify->user;
            if(!$user->verified) {
                $verify->user->verified = 1;
                $verify->user->save();
                $status = "Your email is successfully verified, You can login right now.";
            } else{
                $status = "Your email is already verified. You can login right now.";
            }
        } else{
            return redirect('/login')->with('warning', 'Sorry your email cannot identified.');
        }
        return redirect('/login')->with('success',$status);
    }
    
    protected function registered(Request $request, $user) {
        $this->guard()->logout();
        return redirect('/login')->with('success', 'Your account is successfully created. Please check your email for activation link. Thank you!.');
    }
}

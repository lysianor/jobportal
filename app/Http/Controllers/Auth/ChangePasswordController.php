<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
    	return view('user.changepassword');
    }

    // Change Password
    public function changepassword(Request $request) {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::find(Auth::id());
        $hashedPassword = $user->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Your password has been successfully changed.');

            return redirect("jobseeker/dashboard");
        }

        $request->session()->flash('failure', 'Your password has not been changed. Please check your old password and try again.');
        return back();
    }
}

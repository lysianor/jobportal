<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    public function __construct() {

        $this->middleware('auth:admin');

    }
    
    public function index()
    {
    	return view('admin.admin-changepassword');
    }

// Start Change Password

    public function adminchangepassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $admin = Admin::find(Auth::id());
        $hashedPassword = $admin->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) 
        {
            //Change the password
            $admin->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Your password has been successfully changed.');

            return redirect("/admin/myprofile");
        }

        $request->session()->flash('failure', 'Your password has not been changed. Please check your old password and try again.');

        return back();
    }

// End Change Password    
}

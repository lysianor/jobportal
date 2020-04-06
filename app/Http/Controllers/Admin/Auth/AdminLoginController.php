<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Route;


class AdminLoginController extends Controller
{

  protected $redirectTo = '/admin/dashboard';
  
  // protected $redirectAfterLogout = 'admin/login';
  
  public function __construct() {
    $this->middleware('guest:admin', ['except' => ['logout']]);
  }

  public function showLoginForm() {
    if (view()->exists('auth.authenticate')) {
        return view('auth.authenticate');
    }

    return view('admin.admin-login');
  }
  
  public function login(Request $request) {
    // Validate the form data
    $this->validate($request, [
      'email'   => 'required|email',
      'password' => 'required|min:8'
    ]);

    // Attempt to log the user in
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      // if successful, then redirect to their intended location
      return redirect()->intended(route('admin.admin-dashboard'));
    }

    // if unsuccessful, then redirect back to the login with the form data
    return redirect()->back()->withInput($request->only('email', 'remember'));
  }

  //Start Admin Logout
  public function logout(Request $request ) {
      Auth::guard('admin')->logout();
      return Redirect('/admin/login');
  }
  //End Admin Logout
    
}
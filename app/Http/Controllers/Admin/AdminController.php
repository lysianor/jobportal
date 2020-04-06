<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Hash;
use App\File;
use session;
use App\Admin;
use App\Job;
use App\Jobcategory;
use App\User;
use App\Verification;
use DB;
use Carbon\Carbon;


class AdminController extends Controller
{ 
    
    public function __construct() {
         $this->middleware(['auth:admin'])->except('logout');    
    }

    public function admindashboard() {
        // Jobseeker Report
        $current_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $last_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(1))->count();
        $last_to_last_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(2))->count();

        // view how many jobsposted and jobseekers
        $postedjobcount = Job::with('jobcategory')->get();
        $jobseekercount = User::with('verification')->get();
        return view('admin.admin-dashboard',compact('postedjobcount','jobseekercount','current_month_users','last_month_users','last_to_last_month_users','current_month_jobs','last_month_jobs','last_to_last_month_jobs'));
    }

    public function adminmyprofile() {
        return view('admin.admin-myprofile');
    }

    public function admineditprofile() {
        return view('admin.admin-editprofile');
    }

    public function admincreatejob() {
        return view('admin.admin-createjob');
    }

    public function adminchangelogo() {
        return view('admin.admin-changelogo');
    }

    public function adminEdit() {
        if (Auth::user()) {
            $admin = Admin::find(Auth::user()->id);
            if ($admin) {
                return view('admin.admin-editprofile')->withUser($admin);
            } else{
                return redirect()->back();
            }
        } else{
            return redirect()->back();
        }
    }

    public function adminUpdate(Request $request) {
        $admin = Admin::find(Auth::user()->id);

        if ($admin) {
            $validate = null;
            $validate = $request->validate([
                'company' => 'required'
            ]);

            if ($validate) {
                $admin->company = $request['company'];
                $admin->save();

                $request->session()->flash('success', 'Profile details updated successfully.');
                return redirect("/admin/myprofile");
            }
        } else{
            return redirect()->back();
        }
    }

    // Change Profile Picture
    public function adminProfile() {
        $admin = Auth::user();
        return view('admin.admin-changelogo',array('admin' => Auth::user()));
    }
    
    public function update_adminlogo(Request $request) {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg|dimensions:max_width=350,max_height=350|max:1000',
        ]);
            $admin = Auth::user();
            $imageName = $admin->id.time().'.'.request()->logo->getClientOriginalExtension();
            $request->logo->move(public_path('/uploads/avatar'), $imageName);
            $admin->logo = $imageName;
            $admin->save();

        return redirect("admin/myprofile")->with("success", "Your Image has been Uploaded successfully.")->with('logo',$imageName);
    }

    // View Chart
    public function viewUsersCharts() {
        $current_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $last_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(1))->count();
        $last_to_last_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(2))->count();
        return view('admin.users.view_users_charts')->with(compact('current_month_users','last_month_users','last_to_last_month_users'));
    }

}
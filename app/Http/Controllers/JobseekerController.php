<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Contracts\Validation\Rule;
use Auth;
use App\User;
use App\Education;
use App\Http\Requests;
use App\Applicant;
use App\Bookmark;
use App\Job;
use App\Jobcategory;
use Session;
use Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class JobseekerController extends Controller
{
    public function __construct() {
         $this->middleware(['auth' => 'verified']);
    }

    // View Dashboard Jobseeker
    public function dashboard() {
        // Users Report per user_id
        $current_month_users = Applicant::where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $last_month_users = Applicant::where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(1))->count();
        $last_to_last_month_users = Applicant::where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(2))->count();  

        // view how many appliedjobs per user_id
        $appliedjobs = Applicant::where('user_id', auth()->user()->id);
        $bookmarkjobs = Bookmark::where('user_id', auth()->user()->id);
        return view('user.dashboard', compact('appliedjobs','bookmarkjobs','current_month_users','last_month_users','last_to_last_month_users'));
    }

    public function myprofile() {
        $user = User::all();
    	return view('user.myprofile', compact('user'));
    }

    public function editprofile() {
    	return view('user.editprofile');
    }

    public function uploadphoto() {
        return view('user.uploadphoto');
    }

    public function uploadresume() {
        return view('user.uploadresume');
    }


    // Change Profile Picture
    public function profile() {
        $user = user();
        $user = Auth::user();
        return view('user.uploadphoto',array('user' => Auth::user()));
    }
    
    public function update_avatar(Request $request) {
         $user = User::find(Auth::user()->id);

         // Validate the user upload of avatar
        if ($request->hasFile('avatar')) {
            request()->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg|max:1000|dimensions:max_width=350,max_height=350',
            ]);
        }

        // Handle the user upload of avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            // Delete current image before uploading new image
            if ($user->avatar !== 'default.png') {
                // $file = public_path('uploads/avatars/' . $user->avatar);
                $file = 'uploads/avatar/' . $user->avatar;
                //$destinationPath = 'uploads/' . $id . '/';

                if (File::exists($file)) {
                    unlink($file);
                }

            }
            // Image::make($avatar)>resize(300, 300)>save(public_path('uploads/avatars/' . $filename));
            Image::make($avatar)->resize(300, 300)->save('uploads/avatar/' . $filename);
            $user = Auth::user();
            $user->avatar = $filename;
            $user->user_id = Auth()->user()->id;
            $user->save();
        }
            return redirect("jobseeker/myprofile")->with("success", "Your Image has been Uploaded successfully.")->with('avatar');
    }

    // Edit & Update Profile Information
    public function edit() {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user)
            {
                return view('user.editprofile')->withUser($user);
            } else{
                return redirect()->back();
            }
        } else{
            return redirect()->back();
        }
    }

    public function update(Request $request) {
        $user = User::find(Auth::user()->id);

        if ($user) {
            $validate = null;
            $validate = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'birthday' => 'required|date',
                'nationality' => 'required',
                'address' => 'required',
                'state' => 'required',
                'city' => 'required',
                'contact_number' => 'required|numeric|min:11',
                'interest' => 'required',
                'description' => 'max:500'
            ]);
            
            if ($validate) {
                $user->first_name = $request['first_name'];
                $user->middle_name = $request['middle_name'];
                $user->last_name = $request['last_name'];
                $user->gender = $request['gender'];
                $user->birthday = $request['birthday'];
                $user->nationality = $request['nationality'];
                // $user->location = $request['address'] . ', ' . $request['city'] . ', ' . $request ['province'];
                $user->address = $request['address'];
                $user->state = $request['state'];
                $user->city = $request['city'];
                $user->contact_number = $request['contact_number'];
                $user->interest = $request['interest'];
                $user->description = $request['description'];
                $user->user_id = Auth()->user()->id;
                $user->save();


                $request->session()->flash('success', 'Profile details updated successfully.');
                return redirect("jobseeker/myprofile");
            }
        } else{
            
            return redirect()->back();
        }
    }

}

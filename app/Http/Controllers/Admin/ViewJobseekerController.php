<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Education;
use App\Experience;
use App\Skill;
use App\Language;
use DB;
use Auth;
use Validator;
use App\Exports\usersExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Foundation\Validation\ValidatesRequests;

class ViewJobseekerController extends Controller
{
    public function __construct(){
         $this->middleware(['auth:admin'])->except('logout');
    }

    public function viewjobseeker($slug){
        $experience = Experience::all();
        $education = Education::all();
        $skill = Skill::all();
        $user = User::all();
        $language = Language::all();

        return view('profile.viewprofilejobseeker', compact('experience', 'education', 'user', 'language','skill'));
    }

    // View All Jobseeker
    public function showallJobseeker(){
        $user = User::all();
        return view('admin.admin-viewjobseeker', compact('user'));
    }

    // View Jobseeker Profile
    public function showProfile($id){
        $experience = Experience::all();
        $education = Education::all();
        $skill = Skill::all();
        $language = Language::all();
        $user = User::find($id);
        return view('profile.viewprofilejobseeker', compact('experience', 'education', 'user', 'skill','language', 'user'));
    }

    /// Export Jobseeker Information on Excel
    public function exportUsers(){
        return Excel::download(new usersExport,'users.xlsx');
    }

}

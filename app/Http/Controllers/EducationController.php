<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Str;
use illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

class EducationController extends Controller
{
	public function __construct() {
         $this->middleware(['auth' => 'verified']);
    }

    public function createeducation() {
        $users = User::all();
        $education = Education::all();
    	return view ('user.createeducation', compact('users', 'education'));
    }

    // View All Education
    public function viewalleducation() {
        $users = User::all();
        // to view specific data with user_id
        $education = Education::where('user_id', auth()->user()->id)->get();
    	return view ('user.education', compact('education','user'));
    }

    // Post/Create Education
    public function education_store(Request $request) {
    	$this->validate($request, [
    		'school' => 'required',
    		'month' => 'required',
    		'year' => 'required',
    		'qualification' => 'required',
    		'field_study' => 'required'
    	]);

    	$education = new Education;
        $users = new User;
        $education->user_id = auth()->user()->id;
    	$education->school = $request->school;
    	$education->month = $request->month;
    	$education->year = $request->year;
    	$education->qualification = $request->qualification;
    	$education->field_study = $request->field_study;
    	$education->major = $request->major;
    	$education->save();

    	return redirect("jobseeker/education")->with("success", "Successfully Added.");
    }

    // Delete Education
    public function education_destroy($id) {
        $education = Education::find($id);
        $education->delete();
        
        return redirect("jobseeker/education")->with("success", "Successfully Deleted.");
    }

    // Edit Education
    public function editEducation($id) {

        $education = Education::all();
        $education = Education::where('id', $id)->first();
        // Can't access other users on edit
        $this->authorize('view',$education);
        return view('user.editeducation', compact('education'));
    }

    // Update Education
    public function updateEducation(Request $request, $id) {
        $this->validate($request, [
            'school' => 'required',
            'month' => 'required',
            'year' => 'required',
            'qualification' => 'required',
            'field_study' => 'required'

        ]);

        $education = Education::find($id);
        $education->school = $request->school;
        $education->month = $request->month;
        $education->year = $request->year;
        $education->qualification = $request->qualification;
        $education->field_study = $request->field_study;
        $education->major = $request->major;
        $education->save();

        return redirect("jobseeker/education")->with("success", "Successfully Updated.");
    }
}

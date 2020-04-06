<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Experience;
use Auth;
use Validator;
use Illuminate\Support\Str;
use illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ExperienceController extends Controller
{
	public function __construct() {
         $this->middleware(['auth' => 'verified']);
    }

	// View All Education
    public function viewallexperience() {
    	$user = User::all();
        // to view specific data with user_id
        $experience = Experience::where('user_id', auth()->user()->id)->get();
    	return view('user.experience', compact('user', 'experience'));
    }

    public function createexperience() {
    	$users = User::all();
        $experience = Experience::all();
    	return view('user.createexperience', compact('user','experience'));
    }

    // Post/Create Experience
    public function experience_store(Request $request) {
    	$this->validate($request, [
    		'position' => 'required',
    		'company' => 'required',
    		'from_month' => 'required',
    		'from_year' => 'required',
    		'to_month' => 'required',
    		'to_year' => 'required',
    		'specialization' => 'required',
    		'role' => 'required',
    		'industry' => 'required',
    		'position_level' => 'required',
    		'description' => 'required'
    	]);

    	$experience = new Experience;
        $users = new User;
        $experience->user_id = auth()->user()->id;
    	$experience->position = $request->position;
    	$experience->company = $request->company;
    	$experience->from_month = $request->from_month;
    	$experience->from_year = $request->from_year;
    	$experience->to_month = $request->to_month;
    	$experience->to_year = $request->to_year;
    	$experience->specialization = $request->specialization;
    	$experience->role = $request->role;
    	$experience->industry = $request->industry;
    	$experience->position_level = $request->position_level;
    	$experience->description = $request->description;
    	$experience->save();

        // $education->users()->sync($request->users, false);

    	return redirect("jobseeker/experience")->with("success", "Successfully Added.");
    }

    // Delete Experience
    public function experience_destroy($id) {
        $experience = Experience::find($id);
        $experience->delete();
        
        return redirect("jobseeker/experience")->with("success", "Successfully Deleted.");
    }

    public function editExperience($id) {
        $experience = Experience::all();
        $experience = Experience::where('id', $id)->first();
        // Can't access other users on edit
        $this->authorize('view',$experience);
        return view('user.editexperience', compact('experience'));
    }

    // Update Education
    public function updateExperience(Request $request, $id) {
        $this->validate($request, [
            'position' => 'required',
            'company' => 'required',
            'from_month' => 'required',
            'from_year' => 'required',
            'to_month' => 'required',
            'to_year' => 'required',
            'specialization' => 'required',
            'role' => 'required',
            'industry' => 'required',
            'position_level' => 'required',
            'description' => 'required'
        ]);

        $experience = Experience::find($id);
        $experience->position = $request->position;
        $experience->company = $request->company;
        $experience->from_month = $request->from_month;
        $experience->from_year = $request->from_year;
        $experience->to_month = $request->to_month;
        $experience->to_year = $request->to_year;
        $experience->specialization = $request->specialization;
        $experience->role = $request->role;
        $experience->industry = $request->industry;
        $experience->position_level = $request->position_level;
        $experience->description = $request->description;
        $experience->save();

        return redirect("jobseeker/experience")->with("success", "Successfully Updated.");
    }
}

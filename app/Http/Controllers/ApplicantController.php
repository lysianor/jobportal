<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Job;
use App\Applicant;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Str;
use illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sample;

class ApplicantController extends Controller
{
    public function __construct() {
         $this->middleware(['auth' => 'verified']);
    }

    // Save Applied Jobs
    public function store(Request $request, $id) {

    	$applicant = new Applicant;
        $applicant->job_id = $request->input('job');
    	$applicant->status = 'Pending';
    	$applicant->user_id = auth()->user()->id;   
    	$applicant->save();

    	// $applicant->jobs()->attach($id);

    	return redirect("jobseeker/applied")->with("success", "Your job application is successfully posted. We will contact you soon.");
    }

    // Applied Jobs / Save
    public function appliedJobs() {
        $id = Auth()->user()->id;
        $user = User::find($id);
        $applicants = Applicant::where('id')->paginate(1);
        $applicants = Applicant::all();
        $jobs = DB::table('applicants')
            ->join('jobs', 'applicants.job_id', '=', 'jobs.id')
            ->when($id, function ($query) use ($id) {
                    return $query->where('applicants.user_id', $id);
                })
            ->orderBy('applicants.created_at', 'desc')
            ->get();

        return view('user.appliedjobs', compact('jobs','users','applicants'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Jobcategory;
use App\Applicant;
use App\User;
use App\Bookmark;
use App\Company;
use Auth;
use DB;
use Illuminate\Support\Str;
use illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index() {
        $jobcategories = Jobcategory::orderBy('id', 'desc')->paginate(8);
        $jobs = Job::orderBy('id', 'desc')->paginate(5);
        $companies = Company::all();
        return view('pages.index', compact('jobs','jobcategories','companies'));
    }

    public function about_us() {
    	return view('pages.about_us');
    }

    public function contact_us() {
    	return view('pages.contact_us');
    }

    public function faq() {
    	return view('pages.faq');
    }

    public function privatepolicy() {
    	return view('pages.privatepolicy');
    }

    public function termsandconditions() {
    	return view('pages.termsandconditions');
    }

    public function findjob() {
        $jobcategories = Jobcategory::all();
        $jobs = Job::all();
        $companies = Company::all();
        return view('jobs.findjob', compact('jobcategories','jobs','companies'));
    }

    public function showallJob() {
         $jobcategories = Jobcategory::pluck('jobcategory', 'id');
         $companies = Company::all();
         // $jobs = Job::with('company')
         //    ->orderBy('id', 'desc')
         //    ->take(7)
         //    ->get();
         $jobs = Job::orderBy('id', 'desc')->paginate(5);
        return view('jobs.findjob', compact('jobcategories','jobs','companies'));
    }

    public function viewjobdescription($id, $slug) {
        $users = User::find($id);
        $user_id = Auth::id();
        $applicants = Applicant::all();
        $bookmarks = Bookmark::all();
        $companies = Company::all();
        $jobs = Job::find($id);
        $existt = DB::table('bookmarks')
            ->join('jobs', 'bookmarks.job_id', '=', 'jobs.id')
            ->when($id, function ($query) use ($id) {
                    return $query->where('bookmarks.job_id', $id);
                })
            ->when($user_id, function ($query) use ($user_id) {
                    return $query->where('bookmarks.user_id', $user_id);
                })
            ->first();
        $exist = DB::table('applicants')
            ->join('jobs', 'applicants.job_id', '=', 'jobs.id')
            ->when($id, function ($query) use ($id) {
                    return $query->where('applicants.job_id', $id);
                })
            ->when($user_id, function ($query) use ($user_id) {
                    return $query->where('applicants.user_id', $user_id);
                })
            ->first();
        if ($exist == null) {
            $result = 'not exist';
        }else{
             $result = 'exist';
        }


        if ($existt == null) {
            $resultt = 'not exist';
        }else{
             $resultt = 'exist';
        }
         // view how many applied job
        // $applicantcounts = Applicant::with('jobs')->get();

        return view ('jobs.viewjobdescription', compact('jobs','result', 'applicants','user_id','users','jobcategories','applicants','resultt','applicantcounts','companies'));
    }

    // Search Job
    public function search(Request $request)
    {
        $companies = Company::all();
        $jobs = Job::with('company')
            ->searchResults()
            ->paginate(5);
        $jobcategories = Jobcategory::pluck('jobcategory', 'id');
        return view('jobs.findjob', compact('jobs','companies','jobcategories'));
    }

    public function viewcompany($id, $slug)
    {
        $users = User::find($id);
        $user_id = Auth::id();
        $applicants = Applicant::all();
        $bookmarks = Bookmark::all();
        $company = Company::all();
        $companies = Company::find($id);
        $jobs = Job::find($id);
        $jobs = Job::with('company')->get();
       // $related= Job::where('company_id', '=', $jobs->company->id)
       //      ->where('id', '!=', $jobs->id)
       //      ->get();

        return view ('jobs.viewcompany', compact('jobs','result', 'applicants','user_id','users','jobcategories','applicants','resultt','applicantcounts','companies','company','related'));
    }
}

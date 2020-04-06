<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Job;
use App\Applicant;
use App\Bookmark;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Str;
use illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;


class BookmarkController extends Controller
{
    public function __construct() {
         $this->middleware(['auth' => 'verified']);
    }

    // Save Bookmark Job
    public function store(Request $request, $id) {

    	$bookmark = new Bookmark;
        $bookmark->job_id = $request->input('job');
    	$bookmark->user_id = auth()->user()->id;   
    	$bookmark->save();

    	$bookmark->jobs()->attach($id);

    	return redirect("jobseeker/bookmark")->with("success", "Successfully Saved.");
    }

    // Bookmark Jobs / Save
    public function bookmarkJobs() {
        $id = Auth()->user()->id;
        $user = User::find($id);
        $jobs = Job::where('id')->paginate(1);
        $bookmarks = Bookmark::all();
        $jobs = DB::table('bookmarks')
            ->join('jobs', 'bookmarks.job_id', '=', 'jobs.id')
            ->when($id, function ($query) use ($id) {
                    return $query->where('bookmarks.user_id', $id);
                })
            ->orderBy('bookmarks.created_at', 'desc')
            ->get();

        return view('user.bookmark', compact('jobs','users','bookmarks'));
    }
    
    // Delete Bookmark Jobs / Save
    public function bookmark_destroy($job_id) {
        $bookmark = Bookmark::where('id',$job_id)->first();
        // $bookmark->delete();

        if ($bookmark != null) {
        $bookmark->delete();
        return redirect()->to('jobseeker/bookmark')->with("success", "Successfully Deleted.");
    }

    return redirect()->to('jobseeker/bookmark')->with("success", "Not Deleted.");
        // return redirect("jobseeker/bookmark")->with("success", "Successfully Deleted.");
    }
}

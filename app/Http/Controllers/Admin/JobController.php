<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Applicant;
use App\User;
use App\Job;
use App\Jobcategory;
use App\Tag;
use App\Bookmark;
use App\Company;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


use Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

class JobController extends Controller
{
    public function __construct() {
         $this->middleware(['auth:admin'])->except('logout');
    }

    public function createjob() {
        $tags = Tag::all();
        $jobcategories = Jobcategory::all();
        $companies = Company::all();
    	$jobs = Job::all();
        return view('admin.admin-createjob', compact('jobs', 'jobcategories', 'tags','companies'));
    }

    // Edit Job
    public function editJob($id) {
        $jobcategories = Jobcategory::all();
        $companies = Company::all();
        $tags = Tag::all();
        $jobs = Job::where('id', $id)->first();
        return view('admin.admin-editjob', compact('jobs', 'jobcategories','tags','companies'));
    }

    // Update Job
    public function JobUpdate(Request $request, $id=null) {
        $this->validate($request, [
            'title' => 'required',
            'jobcategory_id' => 'required|integer',
            'description' => 'required',
            // 'work_type' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'salary' => 'required',
        ]);

        $jobs = Job::find($id);
        $jobs->title = $request->title;
        $jobs->jobcategory_id = $request->jobcategory_id;
        $jobs->description = $request->description;
        $jobs->company_id = $request->company_id;
        $jobs->work_type = $request->work_type;
        $jobs->location = $request->location;
        $jobs->experience = $request->experience;
        $jobs->salary = $request->salary;

        // Image Edit
        if ($request->hasFile('company_logo')) {
            $image_tmp = $request->file('company_logo');
            if($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = time(). '.'.$extension;
                $large_image_path = 'uploads/avatar/admin/'.$filename;

                // Resize 
                Image::make($image_tmp)->save($large_image_path);
                // Deleted Recent Image
                $large_image_path = 'uploads/avatar/admin/';
                    if(file_exists($large_image_path.$jobs->company_logo)){
                        unlink($large_image_path.$jobs->company_logo);
                    }
                $jobs->company_logo = $filename;
            }
        }else{
            $filename = $jobs['current_image'];
        }
        $jobs->save();
        $jobs->tags()->sync($request->tags);

        return redirect("admin/manage/job")->with("success", "Successfully Updated.");
    }

    // View All Job to Manage
    public function managejob() {
        $jobs = Job::all();
        return view('admin.admin-managejob', compact('jobs'));
    }

    // Delete Job
    public function JobDestroy(Request $request,$id = null) {
        $bookmark = Bookmark::find($id);
        $jobs = Job::find($id);
        $companies = Company::find($id);
        // Delete Current Image
        // $company_logo = Job::where(['id'=>$id])->first();
        // $large_image_path = 'uploads/avatar/admin/';
        // if(file_exists($large_image_path.$jobs->company_logo)){
        //     unlink($large_image_path.$jobs->company_logo);
        // } 
        $jobs->tags()->detach();
        $jobs->delete();   
        
        return redirect("admin/manage/job")->with("success", "Successfully Deleted.");
    }

    // View Specific Job to Manage
    public function showJob($id, $slug) {
        $jobs = Job::find($id);
        $applicants = Applicant::all();
        $users = User::all();
        $companies = Company::all();
        return view('admin.admin-viewmanagejob', compact('jobs','applicants','users','companies'));
    }

    // View Admin Job Description to Manage
    public function AdminJobdesc($id) {
        $jobs = Job::find($id);
        return view('jobs.viewadminjobdescription', compact('jobs'));
    }

    // Post/Create Job
    public function createjobstore(Request $request) {
    	$this->validate($request, [
    		'title' => 'required',
            'jobcategory_id' => 'required|integer',
            'description' => 'required',
            'company_id' => 'required',
            // 'company_name' => 'required',
            // 'company_profile' => 'required',
            'work_type' => 'required',
            // 'contact_number' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            // 'company_logo' => 'required|image|mimes:jpeg,png,jpg|max:5000'
    	]);

    	$jobs = new Job;
    	$jobs->title = $request->title;
        $jobs->jobcategory_id = $request->jobcategory_id;
        $jobs->description = $request->description;
        $jobs->company_id = $request->company_id;
        // $jobs->company_name = $request->company_name;
        // $jobs->company_profile = $request->company_profile;
        $jobs->work_type = $request->work_type;
        // $jobs->contact_number = $request->contact_number;
        // $jobs->email = $request->email;
        // $jobs->website = $request->website;
        $jobs->location = $request->location;
        $jobs->experience = $request->experience;
        $jobs->salary = $request->salary;
        // Image
         if ($request->hasFile('company_logo')) {
            $image_tmp = $request->file('company_logo');
            if($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111,99999). '.'.$extension;
                $large_image_path = 'uploads/avatar/admin/'.$filename;
                // Resize
                Image::make($image_tmp)->save($large_image_path);
                $jobs->company_logo = $filename;
            }
        }
    	$jobs->save();
        $jobs->tags()->sync($request->tags, false);

    	return redirect("admin/manage/job")->with("success", "Successfully Added.");
    }


    public function search(Request $request) {
        $jobs = \DB::table('jobs');
        if( $request->input('search')){
            $jobs = $jobs->where('jobtitle', 'LIKE', "%" . $request->search . "%")->orWhere('worktype', 'LIKE', "%" . $request->search . "%")->orWhere('companyname', 'LIKE', "%" . $request->search . "%");
        }

        $jobs = $jobs->paginate(10);
        return view('admin.admin-managejob', compact('jobs'));
    }

    public function shortlist($id) {
        $jobs = Job::findOrFail($id);
        $c = User::all();
        $applicants = DB::table('applicants')
            ->join('users', 'applicants.user_id', '=', 'users.user_id')
            ->join('jobs', 'applicants.job_id', '=', 'jobs.id')
            // ->join('users', 'applicants.user_id', '=', 'users.id')
            ->where(function ($query) use ($id) {
                        $query->where('applicants.job_id', $id);
                 })  
            ->orderBy('applicants.created_at', 'desc')
            ->get();
        return view('admin.admin-viewmanagejob', compact('jobs', 'applicants','users'));
    }

    public function shortlistt($id, $user) {
        $jobs = Job::findOrFail($id);
        $applicants = DB::table('applicants')
            ->when($id, function ($query) use ($id) {
                    return $query->where('job_id', $id);
                })
            ->when($user, function ($query) use ($user) {
                    return $query->where('user_id', $user);
                })
            ->update(['status' => 'Shortlist']);   
        return redirect()->to('/admin/manage/job/'.$id);


    }

    public function interview($id, $user) {
        $applicants = DB::table('applicants')
            ->when($id, function ($query) use ($id) {
                    return $query->where('job_id', $id);
                })
            ->when($user, function ($query) use ($user) {
                    return $query->where('user_id', $user);
                })
            ->update(['status' => 'Interview']);   
        return redirect()->to('/admin/manage/job/'.$id);
    }

    public function approved($id, $user) {
        $applicants = DB::table('applicants')
            ->when($id, function ($query) use ($id) {
                    return $query->where('job_id', $id);
                })
            ->when($user, function ($query) use ($user) {
                    return $query->where('user_id', $user);
                })
            ->update(['status' => 'Approved']);   
        return redirect()->to('/admin/manage/job/'.$id);
    }

    public function decline($id, $user) {
        $applicants = DB::table('applicants')
            ->when($id, function ($query) use ($id) {
                    return $query->where('job_id', $id);
                })
            ->when($user, function ($query) use ($user) {
                    return $query->where('user_id', $user);
                })
            ->update(['status' => 'Decline']);   
        return redirect()->to('/admin/manage/job/'.$id);
    }  
   
}

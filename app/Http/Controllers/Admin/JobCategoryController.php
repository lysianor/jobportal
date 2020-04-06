<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobcategory;
use App\Job;
use DB;
use Auth;
use Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;


class JobCategoryController extends Controller
{
    public function __construct() {
         $this->middleware(['auth:admin'])->except('logout');
    }

    public function createjobcategory() {
        return view('admin.admin-createjobcategory');
    }

    // View All Jobcategory
    public function jobcategory() {
    	$jobcategories = Jobcategory::all();
        return view('admin.admin-jobcategory', compact('jobcategories'));
    }

    // Edit Jobcategory
    public function editJobcategory($id) {
    	$jobcategories = jobcategory::where('id', $id)->first();
        return view('admin.admin-editjobcategory', compact('jobcategories'));
    }

    // Update Jobcategory
    public function JobcategoryUpdate(Request $request, $id) {
    	$this->validate($request, [
    		'jobcategory' => 'required|unique:jobcategories,jobcategory|max:50',
    	]);

    	$jobcategories = Jobcategory::find($id);
    	$jobcategories->jobcategory = $request->jobcategory;
    	$jobcategories->save();

    	return redirect("admin/job-category")->with("success", "Successfully Updated.");
    }


    // Delete Jobcategory
    public function JobcategoryDestroy(Jobcategory $jobcategory) {
        if ($jobcategory->jobs()->count()){
            return redirect()->back()->withMessage('Cannot Delete non-empty category');
        }
        $jobcategory->delete();
    	   return redirect("admin/job-category")->with("success", "Successfully Deleted.");
    }

    
    // Post/Create Jobcategory
    public function job_store(Request $request) {
    	$this->validate($request, [
    		'jobcategory' => 'required|unique:jobcategories,jobcategory|max:50',
    	]);

    	$category = new Jobcategory;
    	$category->jobcategory = $request->jobcategory;
    	$category->save();

    	return redirect("admin/job-category")->with("success", "Successfully Added.");
    }

    // Delete Selected Jobcategory
    public function JobcategoryDestroyall(Request $request) {   
        $delallid = $request->input('delallid');
        Jobcategory::whereIn('id', $delallid)->delete();
        return redirect("admin/job-category")->with("success", "Successfully Deleted.");
    }
}

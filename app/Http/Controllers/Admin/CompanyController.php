<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Job;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class CompanyController extends Controller
{
    public function __construct() {
         $this->middleware(['auth:admin'])->except('logout');
    }

    public function createcompany() {
        return view('admin.admin-createcompany');
    }

    // View All Companies
    public function company() {
    	$companies = Company::all();
        return view('admin.admin-company', compact('companies'));
    }

    // Edit Job
    public function editCompany($id) {
        $companies = Company::where('id', $id)->first();
        return view('admin.admin-editcompany', compact('companies'));
    }

    // Post/Create Companies
    public function company_store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|unique:companies,name|max:50',
    		'description' => 'required',
            'industry' => 'required',
    		'location' => 'required',
    		'contact_number' => 'required',
    		'email' => 'required',
    		'website' => 'required',
    		'company_logo' => 'required',
    	]);

    	$companies = new Company;
    	$companies->name = $request->name;
    	$companies->description = $request->description;
        $companies->industry = $request->industry;
    	$companies->contact_number = $request->contact_number;
    	$companies->location = $request->location;
    	$companies->email = $request->email;
    	$companies->website = $request->website;

    	// Image
         if ($request->hasFile('company_logo')) {
            $image_tmp = $request->file('company_logo');
            if($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111,99999). '.'.$extension;
                $large_image_path = 'uploads/avatar/admin/'.$filename;
                // Resize
                Image::make($image_tmp)->save($large_image_path);
                $companies->company_logo = $filename;
            }
        }
        $companies->save();

    	return redirect("admin/company")->with("success", "Successfully Added.");
    }

    // Update Company
    public function CompanyUpdate(Request $request, $id=null) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'required',
            'industry' => 'required',
            'location' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'website' => 'required',
            
        ]);

        $companies = Company::find($id);
        $companies->name = $request->name;
        $companies->description = $request->description;
        $companies->industry = $request->industry;
        $companies->contact_number = $request->contact_number;
        $companies->location = $request->location;
        $companies->email = $request->email;
        $companies->website = $request->website;
        

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
                    if(file_exists($large_image_path.$companies->company_logo)){
                        unlink($large_image_path.$companies->company_logo);
                    }
                $companies->company_logo = $filename;
            }
        }else{
            $filename = $companies['current_image'];
        }
        $companies->save();

        return redirect("admin/company")->with("success", "Successfully Updated.");
    }

    // Delete Company
    public function CompanyDestroy(Request $request,$id = null) {
        $jobs = Job::find($id);
        $companies = Company::find($id);
        if ($companies->jobs()->count()){
            return redirect()->back()->withMessage('Cannot Delete non-empty category');
        }
        
        // Delete Current Image
        $company_logo = Company::where(['id'=>$id])->first();
        $large_image_path = 'uploads/avatar/admin/';
        if(file_exists($large_image_path.$companies->company_logo)){
            unlink($large_image_path.$companies->company_logo);
        } 
        $companies->delete();   
        
        return redirect("admin/company")->with("success", "Successfully Deleted.");
    }
}

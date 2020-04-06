<?php

   

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator,Redirect,Response;
use Auth;
use App\User;
use App\Http\Requests;
use Session;
use Hash;
Use App\Document;



class FileUploadController extends Controller
{
    public function __construct() {
         $this->middleware(['auth' => 'verified']);
    }

    public function create() {
        return view('user.uploadresume');
    }

    // Resume File Upload
    public function store(Request $request) {

        $this->validate($request, [

                'resume' => 'required',
                'resume.*' => 'mimes:doc,pdf,docx|max:3000'

        ]);

        if($request->hasfile('resume'))
        {
            foreach($request->file('resume') as $file)
            {   
                $user = Auth::user();
                $name=Auth::user()->email . "-" . "Resume" . "." . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads/resume'), $name);
                $user->resume = $name;
            }
        }
            $user->save();
        return redirect("jobseeker/myprofile")->with("success", "Your Resume file has been Uploaded successfully.");
    }

}
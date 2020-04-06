<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Language;
use Auth;
use Validator;
use Illuminate\Support\Str;
use illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LanguageController extends Controller
{
    public function __construct() {
         $this->middleware(['auth' => 'verified']);
    }

    // View All Language
    public function viewalllanguage() {
        $user = User::all();
        // to view specific data with user_id with paginate
        $language = Language::where('user_id', auth()->user()->id)->get();
    	return view ('user.language', compact('language','user'));
    }

    public function createlanguage() {
        $users = User::all();
        $language = Language::all();
    	return view ('user.createlanguage', compact('users', 'language'));
    }

     // Post/Create Language
    public function language_store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|unique:languages,name,NULL,id,user_id,'.Auth::user()->id,
    		'read' => 'required',
    		'write' => 'required',
    		'speak' => 'required',
    	]);

    	$language = new Language;
        $user = new User;
        $language->user_id = auth()->user()->id;
    	$language->name = $request->name;
    	$language->read = $request->read;
    	$language->write = $request->write;
    	$language->speak = $request->speak;
    	$language->save();

    	return redirect("jobseeker/language")->with("success", "Successfully Added.");
    }

    // Delete Language
    public function language_destroy($id) {
        $language = Language::find($id);
        $language->delete();
        
        return redirect("jobseeker/language")->with("success", "Successfully Deleted.");
    }

    // Edit Language
    public function editLanguage($id) {
        $language = Language::all();
        $language = Language::where('id', $id)->first();
        // Can't access other users on edit
        // if(auth()->user()->id !==$language->user_id)
        // {
        //     return redirect('jobseeker/dashboard')->withMessage('Unauthorized Page');
        // }
        $this->authorize('view',$language);
        return view('user.editlanguage', compact('language'));
    }

    // Update Language
    public function updateLanguage(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|unique:languages,name,NULL,id,user_id,'.Auth::user()->id,
    		'read' => 'required',
    		'write' => 'required',
    		'speak' => 'required',
        ]);

        $language = Language::find($id);
        $language->name = $request->name;
    	$language->read = $request->read;
    	$language->write = $request->write;
    	$language->speak = $request->speak;
        $language->save();

        return redirect("jobseeker/language")->with("success", "Successfully Updated.");
    }
}

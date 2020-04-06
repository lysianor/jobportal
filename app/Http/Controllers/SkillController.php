<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use Auth;
use Validator;
use Illuminate\Support\Str;
use illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SkillController extends Controller
{
    public function __construct() {
         $this->middleware(['auth' => 'verified']);
    }

    // View All Skill
    public function viewallskill() {
        $user = User::all();
        // to view specific data with user_id
        $skill = Skill::where('user_id', auth()->user()->id)->get();
    	return view ('user.skill', compact('skill','user'));
    }

    // Create Skill
    public function createskill() {
        $user = User::all();
        $skill = Skill::all();
    	return view ('user.createskill', compact('user', 'skill'));
    }

    // Post/Create Skill
    public function skill_store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|unique:skills,name,NULL,id,user_id,'.Auth::user()->id,
    		'score' => 'required'
    	]);

    	$skill = new Skill;
        $user = new User;
        $skill->user_id = auth()->user()->id;
    	$skill->name = $request->name;
    	$skill->score = $request->score;
    	$skill->save();

    	return redirect("jobseeker/skill")->with("success", "Successfully Added.");
    }

    // Delete Skill
    public function skill_destroy($id) {
        $kkill = Skill::find($id);
        $kkill->delete();
        
        return redirect("jobseeker/skill")->with("success", "Successfully Deleted.");
    }

    // Edit Skill
    public function editSkill($id) {
        $skill = Skill::all();
        $skill = Skill::where('id', $id)->first();
        // Can't access other users on edit
        $this->authorize('view',$skill);
        return view('user.editskill', compact('skill'));
    }

    // Update Skill
    public function updateSkill(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|unique:skills,name,NULL,id,user_id,'.Auth::user()->id,
            'score' => 'required'

        ]);

        $skill = Skill::find($id);
        $skill->name = $request->name;
        $skill->score = $request->score;
        $skill->save();

        return redirect("jobseeker/skill")->with("success", "Successfully Updated.");
    }

}

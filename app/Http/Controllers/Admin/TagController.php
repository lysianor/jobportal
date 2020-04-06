<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Tag;
use App\Job;
use Auth;
use Validator;
use Datatables;
use Illuminate\Foundation\Validation\ValidatesRequests;

class TagController extends Controller
{
    public function __construct() {
         $this->middleware(['auth:admin'])->except('logout');
    }

    public function createtag() {
        return view('admin.admin-createtag');
    }

    // View All Jobcategory
    public function viewalltag() {
    	$tag = Tag::all();
        return view('admin.admin-tag', compact('tag'));
    }

    // Post/Create Tag
    public function tagstore(Request $request) {
    	$this->validate($request, [
    		'tag' => 'required|unique:tags,tag|max:50',
    	]);

    	$tag = new Tag;
    	$tag->tag = $request->tag;
    	$tag->save();

    	return redirect("admin/tag")->with("success", "Successfully Added.");
    }

    // Edit Tag
    public function editTag($id) {
    	$tag = Tag::where('id', $id)->first();
        return view('admin.admin-edittag', compact('tag'));
    }

    // Update Tag
    public function updateTag(Request $request, $id) {
    	$this->validate($request, [
    		'tag' => 'required|unique:tags,tag|max:50',
    	]);

    	$tag = Tag::find($id);
    	$tag->tag = $request->tag;
    	$tag->save();

    	return redirect("admin/tag")->with("success", "Successfully Updated");
    }

	// Delete Tag
    public function destroyTag($id) {

        $tag = Tag::find($id);
        $tag->jobs()->detach();
        $tag->delete();
    	return redirect("admin/tag")->with("success", "Successfully Deleted.");
    }

    // Delete Selected Tag
    public function TagDestroyall(Request $request) {       
        $delallid = $request->input('delallid');
        Tag::whereIn('id', $delallid)->delete();
        return redirect("admin/tag")->with("success", "Successfully Deleted.");

    }
}

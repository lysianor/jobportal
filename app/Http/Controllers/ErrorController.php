<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function Error404user() {
    	return view('error.404user');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
		#$json = file_get_contents('php://input');
		#dd($json);
    	if ($request->has('id')) {
	    	$user = User::with('Comments')->whereId($request->id)->first();

	    	if (is_null($user)) {
	    		abort(404);
	    	}
	    	#dd($user);
	    	$data = compact('user');

	    	return view('index', $data);
    	}
    	
    	abort(404);
    }
}

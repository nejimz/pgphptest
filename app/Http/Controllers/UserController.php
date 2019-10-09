<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->has('id')) {
	    	$user = User::with('Comments')->first();
	    	#dd($user);
	    	$data = compact('user');

	    	return view('index', $data);
    	}
    	
    	abort(404);
    }
}

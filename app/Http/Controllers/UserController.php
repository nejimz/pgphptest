<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Comments;
use Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->has('id')) {
	    	$user = User::with('Comments')->whereId($request->id)->first();

	    	if (is_null($user)) {
	    		abort(404);
	    	}

	    	$data = compact('user');

	    	return view('index', $data);
    	}
    	
    	abort(404);
    }

    public function index_post(Request $request)
    {
    	/*if (!$request->has('json')) {
    		return response()->json(['JSON is required!'], 422);
    	}

		$json = json_decode($request->json, true);

		if (is_null($json)) {
			return response()->json(['Invalid JSON!'], 422);
		}*/

		/*$val = $request->validate([
			'id' => 'required|numeric|unique:users,id',
			'password' => 'required|same:720DF6C2482218518FA20FDC52D4DED7ECC043AB',
			'comments' => 'required'
		]);*/

		$val = Validator::make($request->all(), [
			'id' => 'required|numeric|exists:users,id',
			'password' => 'required|in:720DF6C2482218518FA20FDC52D4DED7ECC043AB',
			'comments' => 'required'
		]);
		
		if ($val->fails()) {
			return response()->json($val->messages(), 200);
		}

		$input = $request->only('comments');
		Comments::whereUserId($request->id)->update($input);

		return response()->json(['Ok!'], 200);
    }
}

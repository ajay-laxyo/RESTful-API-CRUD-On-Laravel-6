<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
    	if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
	       $user = Auth::user();
	       //$success['token'] = $user->createToken('MyApp')->accessToken;

	       return response()->json(['success' => 'login Successfully'], 200);
	   } else {
	       return response()->json(['error' => 'Unauthorised'], 401);
	   }
    }
}

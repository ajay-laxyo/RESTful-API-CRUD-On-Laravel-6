<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class RegisterController extends Controller
{
        /**
        * Register api
        *
        * @return \Illuminate\Http\Response
        */
       public function register(Request $request)
       {
          $validator = Validator::make($request->all(), [
               'name' => 'required',
               'email' => 'required|email|unique:users',
               'password' => 'required',
           ]);


            if($validator->fails()){
               return response()->json($validator->errors());
            }
            else
            {
              $input = $request->all();
              $input['password'] = bcrypt($input['password']);
              $user = User::create($input);
             
              $success['user'] =  $user->name." registered successfully";
              
              return response()->json($success);
            }
           
       }
}

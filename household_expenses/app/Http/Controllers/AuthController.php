<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends BaseController
{
    public function register(Request $request)
    {
        $input = $request->all();
        $validator= Validator::make($input,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validate error',$validator->errors());
        }

        $message=[];
        if (User::where('email',$request->email)->first()) {
            return $this->sendError('this email address is not available. choose a different address',$message);
        }


        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('Household_ExpensesProject')->accessToken;
        $success['name'] = $user->name;
        $success['id']= $user->id;
        return $this->sendResponse($success,'User registered Successfully!');

    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('Household_ExpensesProject')->accessToken;
            $success['name'] = $user->name;
            $success['id']= $user->id;
            return $this->sendResponse($success, 'User Login Successfully!' );
        }
        else{
            return $this->sendError('Unauthorized',['error','unauthorized']);
        }
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use JWTAuth;
use Response;

class apiController extends Controller
{
    public function register(REQUEST $request){
        $user_data = $request->all();
        $arr = [
            'firstName'     => 'required',
            'lastName'      => 'required',
            'email'         => 'email',
            'image'         => 'required',
            'password'      => 'required',
        ];

        $vaild = Validator::make($user_data,$arr);
        if($vaild->fails()){
            return response()->json(['data' => $vaild->errors(),'status'=>500]);
        }
        $user = User::create([
            'firstName' => $request->firstName,
            'lastName'  => $request->lastName,
            'email'     => $request->email,
            'image'     => $request->image,
            'password'  => bcrypt($request->password),
        ]);

        /* create The token */

        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));

        /* create The token */

    }
    public function login(REQUEST $request){
        $arr = [
            'email' => 'required',
            'password'  => 'required',
        ];

        $vaild = Validator::make($request->all(),$arr);

        if($vaild->fails()){
            return response()->json($vaild->errors());
        }

        $attemp = $request->only('email','password');

        try{
            if(!$token = JWTAuth::attempt($attemp)){
                return response()->json(['error','error data']);
            }
        }
        catch(JWTException $e){
            return response()->json(['error','could not create token']);
        }

        return response()->json(compact('token'));


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required','string'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','confirmed']
        ]);
        $credentials['password']=Hash::make($request->password);
        $user=User::create($credentials);
        $token=$user->createAuthToken('auth');

        return response([
            'user'=> $user , 
            'token'=>$token
        ]);
    }



    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'   => ['required'],
            'password'=> ['required']
        ]);
        
        if(Auth::attempt($credentials)){
        $user=User::where('email',$request->email)->first();
        $token = $user->createAuthToken('auth',now()->addMinutes(10));
        $refreshtoken = $user->createRefreshToken('refresh',now()->addMinutes(20));
        return response([
            'user'=> $user, 
            'token'=>$token ,
            'refresh_token' =>$refreshtoken
        ]);
        }
      else{
        return response(['message'=>'Wrong credentials'] , 401);
      }
        

      
    }

    public function logout(Request $request){    
        $request->user()->tokens()->delete();
        return response()->json(['message'=>"logged out !"]);
}

}
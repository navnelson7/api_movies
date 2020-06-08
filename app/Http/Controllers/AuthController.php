<?php

namespace App\Http\Controllers;

use App\Http\Request\RegisterAutRequest;
use App\User;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth as JWTAuthJWTAuth;

class AuthController extends Controller
{
    public $loginAfterSingUp = true;

    //regiter new user
    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //encriptando el password
        $user->role = $request->role;
        //storage movie
        $user->save();

        //auto-login to after singup
        if($this->loginAfterSingUp){
            return $this->login($request);
        }

        //sending response ok and data user
        return response()->json([
            'status' => 'ok',
            'data' => $user
        ], 200);
    }

    //function to login access
    public function login(Request $request){
        $input = $request->only('email','password');
        $jwt_token = null;
        if(!$jwt_token =  JWTAuth::attempt($input)){
            return response()->json([
                'status' => 'Invalid_Credentials',
                'message' => 'mail or password incorrect',
            ], 401);
        }
        //send responde  login ok with jwt asigned
        return response()->json([
            'status' => 'ok',
            'token' => $jwt_token,
        ]);
    }

    //function to logout user 
    public function logout(Request $request){
        $this->validate($request,[
            'token' => 'required'
        ]);
        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'status' => 'ok',
                'message' => 'logout success'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => 'unknown_Error',
                'message' => 'user could not log out'
            ], 500);
        }
    }
    
    //get autentication user
    public function getAuthUser(Request $request){
        $this->validate($request,[
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($requet->token);
        return response()->json(['user'=>$user]);
    }
}

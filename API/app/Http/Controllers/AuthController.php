<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'number' => 'required|integer',
            'password' => 'required|string', //|confirmed  //able to post without confirmed
        ]);

        $user = User::create([
            'name' => $fields ['name'],
            'email' => $fields ['email'],
            'number' =>$fields['number'],
            'password'=> bcrypt($fields['password']),

        ]);

        // $token = $user->createToken('myapptoken')->plainTextToken;  //token to use to post

        $response = [
            'user' => $user,
            // 'token' => $token, //response with token
        ];
        
        return response($response, 201);
    }


    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        //Check Email
        $user = User::where('email', $fields['email'])->first();

        //Check Password

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad Creds'
            ], 401);
        }


        // $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            
            // 'token' => $token,
        ];
        
        // return response($response, 201);
        return [
            'message'=> 'Logged In',
            'user' => $user,
        ];
    }

    public function logout(Request $request){
        
        // auth()->user()->token()->delete();

        Session::flush();

        Auth::logout();

        return [
            'message' => 'Logged Out'
        ];
    }

    public function users(Request $request){

        $users = User::all();
        return response()->json($users);
    }
}

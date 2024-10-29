<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserAuthController extends Controller
{
    function login (Request $req){
       $user=User::where("email",$req->email)->first();
        if (!$user || !Hash::check($req->password,$user->password)) {
            return "User Not found";
        }else{
            $toker=$user->createToken("MyApp")->plainTextToken;
            return response()->json(['user' => $user, 'token' => $toker], 201);
        }
    }
   
    function sigin (Request $req){
        // Validation rules
        $rule = [
            "name" => 'required|min:3|max:30',
            "email" => "required|email",
            "password" => 'required|min:8|max:20'
        ];

        $validation = Validator::make($req->all(), $rule);
        
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        } else {
            // Creating a new user
            $student = new User();
            $student->name = $req->name;
            $student->email = $req->email;
            $student->password = bcrypt($req->password); 
            $student->remember_token = $req->remember_token;
            
            if ($student->save()) {
                $successToken = $student->createToken("MyApp")->plainTextToken;
                return response()->json(['user' => $student, 'token' => $successToken], 201);
            }
        }
        
        return response()->json(['message' => 'User not created'], 500);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    function getUser(){
      return User::all();
    }


    //  Create User Post request
    function createUser(Request $req){
//    instance create
$userCreate=new User();
$userCreate->name=$req->name;
$userCreate->email=$req->email;
$userCreate->phone=$req->phone;
if ($userCreate->save()) {
  return $userCreate;
    }else{
        return "User Not Create";
    }
}
// single User fetch
function singleUser(Request $request){
   $singleUser=User::find($request->id);
   return $singleUser;
}

// 

// PUT request handle User Update
function userUpdate(Request $request,$id){
    $UpdateUser=User::find($id);
    if (!$UpdateUser) {
        return response()->json(["message" => "User not found"], 404); 
    }
    $UpdateUser->name=$request->name;
    $UpdateUser->email=$request->email;
    $UpdateUser->phone=$request->phone;
    if ($UpdateUser->save()) {
        return "Update User". $UpdateUser;
    }
    else{
        return "No Update User";
    }
}

}

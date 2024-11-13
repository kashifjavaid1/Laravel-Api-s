<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    function getUser(){
      return User::all();
    }


    //  Create User Post request
    function createUser(Request $req){
        $rule=array(
            'name' => 'required|min:5|max:20',
    'email' => 'required|email',
    'phone' => 'required|numeric|min:11,max:11',
        );
        $validation=Validator::make($req->all(),$rule);
        if ($validation->fails()) {
           return $validation->errors();
        }else{
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
// Delete User 
// param pass id 
function DeleteUser($id){
  $student=User::destroy($id);
  if ($student) {
    return "Student sucessfull deleted";
  }
  else{
    return "Student failed deleted";
  }
}

// Multiple Deleted
function MultipleDelete(Request $req){
    $ids=$req->ids;
    $student=User::destroy($ids);
    if ($student) {
        return "Student sucessfull deleted";
      }
      else{
        return "Student failed deleted";
      }
}

// search Api 
function searchApi(Request $request,$name){
    $student=User::where("name","like","%$name%")->get();
    return $student;
}
}

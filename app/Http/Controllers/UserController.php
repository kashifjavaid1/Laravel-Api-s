<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    function getUser(){
      return User::all();
    }

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


}

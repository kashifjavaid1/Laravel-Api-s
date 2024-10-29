<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("test",function(){
//     return ["name"=>"kashif","email"=>"abc@gmail.com"];
// });


Route::get("user",[UserController::class,"getUser"]);
Route::get("single/{id}",[UserController::class,"singleUser"]);
Route::post("add-user",[UserController::class,"createUser"]);
Route::patch("edit-user/{id}", [UserController::class, "userUpdate"]);
Route::delete("delete/{id}", [UserController::class, "DeleteUser"]);
Route::delete("multiple-delete", [UserController::class, "MultipleDelete"]);
Route::get("search/{name}", [UserController::class, "searchApi"]);

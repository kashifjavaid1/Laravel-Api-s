<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValideUser;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
});
Route::get("/sigin",function(){
        return view("sigin");
    })->middleware(ValideUser::class);
    Route::get("/sigin",function(){
        return view("sigin");
    })->middleware(ValideUser::class);

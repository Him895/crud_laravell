<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeApicontroller; // studentcontroller ko import karna hai
use App\Http\Controllers\Authscontroller;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('team',[EmployeeApicontroller::class,'view']);
Route::get('createdata',[EmployeeApicontroller::class,'create']);
Route::get('deletedata',[EmployeeApicontroller::class,'delete']);
Route::get('updatedata',[EmployeeApicontroller::class,'update']);



Route::post('/register', [Authscontroller::class, 'register']);




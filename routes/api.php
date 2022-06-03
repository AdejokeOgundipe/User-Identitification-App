<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//upload
Route::post('register', [\App\Http\Controllers\RegistrationController::class, 'registration']);
Route::get('get/users', [\App\Http\Controllers\RegistrationController::class, 'getRegisteredUsers']);
Route::post('upload', [\App\Http\Controllers\RegistrationController::class, 'upload']);
Route::post('webCam', [\App\Http\Controllers\RegistrationController::class, 'webCam']);
Route::post('additionalDetails', [\App\Http\Controllers\RegistrationController::class, 'additionalDetails']);



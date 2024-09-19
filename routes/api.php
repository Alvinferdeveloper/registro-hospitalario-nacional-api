<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Auth
Route::post('/auth/register',[AuthController::class, 'register'] );
Route::post('/auth/login',[AuthController::class, 'login'] );
Route::post('/auth/healthcarerlogin',[AuthController::class, 'healthCarerLogin'] );


//HealtCarer
Route::middleware(['auth:sanctum', 'checkrole:Admin,HealthCarerAdmin'])->group(function () {
    Route::post('/auth/healthcarerregister',[AuthController::class, 'healthCarerRegister'] );
    Route::get('/patient/getPatientByHealthCarer/{id}', [PatientController::class, 'getPatientByHealthCarer']);
    Route::get('/patient/getPatients', [PatientController::class, 'getPatients']);
});


Route::middleware(['auth:sanctum', 'checkrole:USER'])->group(function () {
    
});




<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/register',[AuthController::class, 'register'] );
Route::post('/auth/login',[AuthController::class, 'login'] );

//Route::post('/auth/healthcarerregister',[AuthController::class, 'healthCarerRegister'] );
Route::post('/auth/healthcarerlogin',[AuthController::class, 'healthCarerLogin'] );

Route::middleware(['auth:sanctum', 'checkrole:Admin,HealthCarerAdmin'])->group(function () {
    Route::post('/auth/healthcarerregister',[AuthController::class, 'healthCarerRegister'] );
});


Route::middleware(['auth:sanctum', 'checkrole:USER'])->group(function () {
    Route::post('/auth/user',function(){
        return response()->json(['name' => 'hola']);
    });
});


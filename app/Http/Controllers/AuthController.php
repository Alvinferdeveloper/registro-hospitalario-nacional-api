<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Services\AddressService;
use App\Services\AuthService;

class AuthController extends Controller
{
    //

    public function register(RegisterUserRequest $request){
        $validatedPatient = $request->validated();
        $addressDoc =  AddressService::insertAddress($validatedPatient);
        $patientDoc =  AuthService::registerPatient($validatedPatient, $addressDoc->id);
        return response()->json($patientDoc, 201);
    }
}

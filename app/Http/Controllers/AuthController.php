<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterHealthCarerRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\AddressService;
use App\Services\PatientService;
use App\Services\HealthCarerService;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    //

    public function register(RegisterUserRequest $request){
        $validatedPatient = $request->validated();
        $addressDoc =  AddressService::insertAddress($validatedPatient);
        $patientDoc =  PatientService::registerPatient($validatedPatient, $addressDoc->id);
        $token = $patientDoc->createToken('Personal Access Token')->plainTextToken;
        return response()->json([ "token"=> $token], 201);
    }

    public function login(Request $request){
        $userName = $request->input('userName');
        $password = $request->input('password');
        $patient = PatientService::patientRegistered($userName, $password);
        if($patient){
            $token = $patient->createToken('Personal Access Token')->plainTextToken;
            return response()->json(['token'=>$token],200);
        }
        else {
            return response()->json([
                "message" => "Credenciales Invalidas",
                "status" => "401"
            ],401);
        }
    }

    public function healthCarerRegister(RegisterHealthCarerRequest $request){
        $user = $request->user();
        $healthCarerValidated = $request->validated();
        $healthCarer = HealthCarerService::registerHealthCarer($healthCarerValidated, $user);
        return response()->json(['healtCarer'=> $healthCarer],200);
    }

    public function healthCarerLogin(Request $request){
        $userName = $request->input('userName');
        $password = $request->input('password');
        $healthCarer = HealthCarerService::healtCarerRegistered($userName, $password);
        if($healthCarer){
            $token = $healthCarer->createToken('Personal Access Token')->plainTextToken;
            return response()->json(['token'=>$token],200);
        }
        else {
            return response()->json([
                "message" => "Credenciales Invalidas",
                "status" => "401"
            ],401);
        }
    }
}

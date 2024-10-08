<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientPlanController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\VaccineController;
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

Route::get('/departament/getDepartaments',[DepartamentController::class, 'getDepartaments'] );
Route::get('/hospital/getHospitals',[HospitalController::class, 'getHospitals'] );

//HealtCarer
Route::middleware(['auth:sanctum', 'checkrole:Admin,HealthCarerAdmin'])->group(function () {
    Route::get('/patient/getPatientByHealthCarer/{id}', [PatientController::class, 'getPatientByHealthCarer']);
    Route::get('/patient/getPatients', [PatientController::class, 'getPatients']);
    Route::get('/consultation/getConsultationsByHealthCarer/{patientId}', [ConsultationController::class,'getConsultationsByHealthCarer']);
    Route::get('/consultation/getConsultationDetailsByHealthCarer/{consultationId}',[ConsultationController::class,'getConsultationDetailsByHealthCarer']);
    Route::get('/vaccines/getHealthcareSystemVaccines',[VaccineController::class,'getHealthCareSystemVaccines']);
    Route::post('/vaccines/newVaccination',[VaccinationController::class,'newVaccination']);
    Route::get('/vaccinations/getVaccinationsByHealthCarer/{patientId}',[VaccinationController::class,'getVaccinationsByHealthCarer']);
    Route::get('/vaccination/getVaccinationDetailsByHealthCarer/{patientId}/{vaccineId}',[VaccinationController::class,'getVaccinationDetailsByHealthCarer']);
});

Route::middleware(['auth:sanctum', 'checkrole:Admin'])->group(function () {
    Route::post('/auth/Admin/healthcarerregister',[AuthController::class, 'healthCarerRegisterByAdmin'] );
});

Route::middleware(['auth:sanctum', 'checkrole:HealthCarerAdmin'])->group(function () {
    Route::post('/auth/HealthCarer/healthcarerregister',[AuthController::class, 'healthCarerRegisterByHealthCarer'] );
    Route::post('/consultation/consultationRegister',[ConsultationController::class,'newConsultation']);
});

Route::middleware(['auth:sanctum', 'checkrole:USER'])->group(function () {
    Route::get('/consultation/getConsultationsByPatient',[ConsultationController::class, 'getConsultationsByPatient'] );
    Route::get('/consultation/getConsultationDetailsByPatient/{consultationId}',[ConsultationController::class, 'getConsultationDetailsByPatient'] );
    Route::get('/vaccinations/getVaccinationsByPatient',[VaccinationController::class,'getVaccinationsByPatient']);
    Route::get('/patientPlans/getPatientPlansByPatient',[PatientPlanController::class,'getPatientPlansByPatient']);
});





Route::middleware(['auth:sanctum', 'checkrole:USER'])->group(function () {
    
});




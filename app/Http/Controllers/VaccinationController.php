<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterVaccinationRequest;
use App\Services\VaccinationService;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    //
    public function newVaccination(RegisterVaccinationRequest $request){
        $healthCarerId = $request->user()->id;
        $requestValidated = $request->validated();
        VaccinationService::insertVaccination($healthCarerId, $requestValidated);
    }

    public function getVaccinationsByHealthCarer($patientId){
        $vaccinations =VaccinationService::getVaccinationsByHealthcarer($patientId);
        return response()->json($vaccinations);
    }
    public function getVaccinationsByPatient(Request $request){
        $patientId = $request->user()->id;
        $vaccinations =VaccinationService::getVaccinationsByPatient($patientId);
        return response()->json($vaccinations);
    }

    public function getVaccinationDetailsByHealthCarer($patientId, $vaccineId){
        $vaccinationDetails = VaccinationService::getVaccinationDetails($patientId,  $vaccineId);
        return response()->json($vaccinationDetails);
    }

    public function getVaccinationDetailsByPatient(Request $request, $vaccineId){
        $patientId = $request->user()->id;
        $vaccinationDetails = VaccinationService::getVaccinationDetails($patientId, $vaccineId);
        return response()->json($vaccinationDetails);
    }
}

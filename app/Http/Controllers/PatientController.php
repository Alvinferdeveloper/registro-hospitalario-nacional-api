<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Services\HealthCarerService;
use App\Services\PatientService;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    
    public function getPatients(Request $request){
    $search = $request->query('search', null);
    $page = $request->query('page', 1);
    $patients = PatientService::searchPatients($search, $page);
    return $patients;
    }

    public function getPatientByHealthCarer(Request $request){
        $healthCarerId = $request->user()->id;
        $patientId = $request->id;
        $patient = PatientService::getPatient($patientId);
        $healthCarer = HealthCarerService::getHealthCarer($healthCarerId);
        return response()->json(["patient" => $patient, "healthCarer" => $healthCarer]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PatientPlanService;
use App\Services\PatientService;
use Illuminate\Http\Request;

class PatientPlanController extends Controller
{
    //
    public function getPatientPlansByPatient(Request $request){
        $patientId = $request->user()->id;
        $patientPlans = PatientPlanService::getPatientPlansByPatient($patientId);
        return response()->json($patientPlans);
    }
}

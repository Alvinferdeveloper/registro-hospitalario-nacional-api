<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterConsultationRequest;
use App\Services\ConsultationService;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    //
    public function newConsultation(RegisterConsultationRequest $request){
        $requestValidated = $request->validated();
        $authUser = $request->user();
        ConsultationService::insertConsultation($requestValidated, $authUser);
    }

    public function getConsultationsByHealthCarer($patientId){
        $consultations = ConsultationService::getConsultations($patientId);
        return response()->json($consultations);
    }

    public function getConsultationsByPatient(Request $request){
        $patientId = $request->user()->id;
        $consultations = ConsultationService::getConsultations($patientId);
        return response()->json($consultations);
    }

    public function getConsultationDetailsByHealthCarer($consultationId){
        $consultationDetail = ConsultationService::getConsultationDetailsByHealthCarer($consultationId);
        return response()->json($consultationDetail);
    }
}

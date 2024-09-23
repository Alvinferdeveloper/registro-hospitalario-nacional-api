<?php
namespace App\Services;
use App\Models\Consultation;

class ConsultationService{

    public static function insertConsultation($requestBody, $healthCarer){
        return Consultation::create([
           'patient_id' =>  $requestBody['patientId'],
           'health_carer_id' => $healthCarer->id,
           'summary' => $requestBody['summary'],
           'diagnosis' => $requestBody['diagnosis'],
           'plan' => $requestBody['plan'],
           'attention_center_id' => $healthCarer->attention_center_id,
        ]);
    }

    public static function getConsultations($patientId){
        return Consultation::with(['healthCarer','patient'])->where('patient_id', $patientId)->get();
    }

    public static function getPatientConsultations($patientId){
        return Consultation::with(['healthCarer','patient'])->where('patient_id', $patientId)->get();
    }
}

?>
<?php

namespace App\Services;

use App\Models\DoctorVaccinatesPatient;

 class VaccinationService{

    public static function insertVaccination($healthcarerId, $requestBody ){
        return DoctorVaccinatesPatient::create([
            'patient_id' => $requestBody['patientId'],
            'health_carer_id' => $healthcarerId,
            'vaccine_id' => $requestBody['vaccineId'],
            'dose' => $requestBody['dose'],
            'vaccine_code' => $requestBody['vaccineCode'],
        ]);
    }

    public static function getVaccinationsByHealthcarer($patientId){
        return DoctorVaccinatesPatient::with(['patient:id,name,lastName', 'healthcarer:id,name:lastName','vaccine'])->where('patient_id', $patientId)->get();
    }

    public static function getVaccinationsByPatient($patientId){
        return DoctorVaccinatesPatient::with(['patient:id,name,lastName', 'healthcarer:id,name:lastName','vaccine'])->where('patient_id', $patientId)->get();
    }

    public static function getVaccinationDetails($patientId, $vaccineId){
        return DoctorVaccinatesPatient::with(['patient:id,name,lastName,gender,birthdate,identification', 'healthcarer:id,name,lastName','vaccine'])
        ->where(['patient_id'=> $patientId, 'vaccine_id' => $vaccineId])->get();
    }
 }

?>
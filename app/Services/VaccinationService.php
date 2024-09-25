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
 }

?>
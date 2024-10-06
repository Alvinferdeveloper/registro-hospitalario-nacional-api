<?php

namespace App\Services;

use App\Models\PatientPlan;

class PatientPlanService
{

    public static function insertPatientPlans($patientPlans, $healthCarerId, $patientId)
    {
       
        foreach ($patientPlans as $plan) {
            PatientPlan::create([
                'healthCarer_id' => $healthCarerId,
                'patient_id' => $patientId,
                'medicament' => $plan['medicament'],
                'prescription' => $plan['prescription'],
            ]);
        }
    }

    public static function getPatientPlansByPatient($patientId){
        return PatientPlan::where(['patient_id' => $patientId])->get();
    }
}

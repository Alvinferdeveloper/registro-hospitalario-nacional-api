<?php

namespace App\Services;
use App\Models\Vaccine;

 class VaccinesService {

    public static function getHealthCareSystemVaccines($healthcare_system_id){
        return Vaccine::where('healthcare_system_id',$healthcare_system_id)->get();
    }
 }

?>
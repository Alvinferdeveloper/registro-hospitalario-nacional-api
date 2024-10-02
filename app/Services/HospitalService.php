<?php
namespace App\Services;

use App\Models\Hospital;

class HospitalService{

    public static function getHospitals(){
       return Hospital::with(['images','address.departament'])->get();
    }
}

?>
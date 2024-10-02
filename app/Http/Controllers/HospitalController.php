<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\HospitalService;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    //
    public function getHospitals(){
        $hospitals = HospitalService::getHospitals();
        return response()->json($hospitals);
    }
}

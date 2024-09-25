<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\VaccinesService;
use Illuminate\Http\Request;


class VaccineController extends Controller
{
    //
    public function getHealthCareSystemVaccines(Request $request){
        $healthCareSystemId = $request->user()->healthcare_system_id;
        $vaccines = VaccinesService::getHealthCareSystemVaccines($healthCareSystemId);
        return response()->json($vaccines);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    //
    public function getDepartaments(){
        $departaments = Departament::select('id','name')->get();
        return response()->json($departaments);
    }
}

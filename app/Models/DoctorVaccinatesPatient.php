<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorVaccinatesPatient extends Model
{
    use HasFactory;
    protected $table = 'doctor_vaccinates_patients';

    protected $fillable = ['health_carer_id', 'patient_id', 'vaccine_id','date', 'dose','attention_center_id','vaccine_code'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = ['id', 'name','doses','healthcare_system_id'];

    public function healthCareSystem(){
        return $this->belongsTo(HealthcareSystem::class,'healthcare_system_id');
    }

    public function vaccunations(){
        return $this->hasMany(DoctorVaccinatesPatient::class,'vaccine_id');
    }
}

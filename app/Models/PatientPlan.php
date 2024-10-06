<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientPlan extends Model
{
    use HasFactory;
    protected $table = 'patient_plans';
    protected $fillable = ['healthCarer_id','patient_id','plan'];

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function healthCarer(){
        return $this->belongsTo(HealthCarer::class, 'healthCarer_id');
    }


}

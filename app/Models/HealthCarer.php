<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCarer extends Model
{
    protected $table = "health_carer";
    protected $fillable = [
        'id',
        'name',
        'lastName',
        'birthday',
        'attention_center_id',
        'area',
        'type',
        'phone_number',
        'email',
        'active',
        'admin_creator',
        'healtcare_system_id',
        'health_carer_creator'
    ];

    public function consultations(){
        return $this->hasMany(Consultation::class,'health_carer_id');
    }

    public function  vacunations(){
        return $this->hasMany(DoctorVaccinatesPatient::class,'health_carer_id');
    }
    
    public function healthCareSystem(){
        return $this->belongsTo(HealthcareSystem::class,'healthcare_system_id');
    }

    public function attentionCenter(){
        return $this->belongsTo(Attentioncenter::class,'attention_center_id');
    }

    public function adminCreator(){
        return $this->belongsTo(Admin::class,'admin_creator');
    }

    public function healthCarerCreator(){
        return $this->belongsTo(HealthCarer::class,'health_carer_creator');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attentioncenter extends Model
{
    use HasUuids;
    protected $table= "attention_centers";
    protected $fillable = ['id', 'name', 'type','address_id','healthcare_system_id',
                            'lat','ing'];
                        
    public function healthCareSystem(){
        return $this->belongsTo(HealthcareSystem::class,'healthcare_system_id');
    }

    public function healthCarers(){
        return $this->hasMany(HealthCarer::class,'attention_center_id');
    }

    public function consultations(){
        return $this->hasMany(Consultation::class,'attention_center_id');
    }

    public function vacunations(){
        return $this->hasMany(DoctorVaccinatesPatient::class,'attention_center_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class,'attention_center_id');
    }



}

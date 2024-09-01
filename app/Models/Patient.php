<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasUuids;
    protected $fillable = [
        'id',
        'name',
        'lastName',
        'identification',
        'birth_certificate',
        'blood_type',
        'marital_status',
        'gender',
        'address_id',
        'healthcare_system_id',
        'phone_number',
        'profile_photo',
        'birthdate',
        'email',
        'password'
    ];

    public function address(){
        return $this->belongsTo(Address::class,'address_id');
    }

    public function healthCareSystem(){
        return $this->belongsTo(healthCareSystem::class,'healthcare_system_id');
    }

    public function vaccunations(){
        return $this->hasMany(DoctorVaccinatesPatient::class,'patient_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class,'patient_id');
    }

    public function consultations(){
        return $this->hasMany(Consultation::class,'patient_id');
    }
}

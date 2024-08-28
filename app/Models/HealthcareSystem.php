<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareSystem extends Model
{   
    protected $table= "healthcare_system";
    protected $fillable = ['id', 'name','logo','admin_creator'];

    public function patients(){
        return $this->hasMany(Patient::class,'healthcare_system_id');
    }

    public function healthCarers(){
        return $this->hasMany(HealthCarer::class,'healthcare_system_id');
    }

    public function adminCreator(){
        return $this->belongsTo(Admin::class,'admin_creator');
    }

    public function attentionCenters(){
        return $this->hasMany(Attentioncenter::class,'healthcare_system_id');
    }

    public function vaccines(){
        return $this->hasMany(Vaccine::class,'healthcare_system_id');
    }
}

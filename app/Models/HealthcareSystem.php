<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareSystem extends Model
{   
    protected $table= "healthcare_system";
    protected $fillable = ['id', 'name', 'created_at','logo','admin_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCarer extends Model
{
    protected $table= "health_carer";
    protected $fillable = ['id', 'name', 'lastName','birthday','attention_center_id',
                            'area','type','numero','email','active','admin_id',
                            'healtcare_system_id','health_carer_id'];
}

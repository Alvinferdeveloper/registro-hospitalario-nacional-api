<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    
    protected $fillable = ['id','patient_id','doctor_id','date','summary',  
                            'diagnosis','plan','attention_center_id'];
}

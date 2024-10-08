<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{

    protected $fillable = [
        'id',
        'patient_id',
        'health_carer_id',
        'reason',
        'date',
        'summary',
        'diagnosis',
        'plan',
        'attention_center_id'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function attentionCenter(){
        return $this->belongsTo(AttentionCenter::class, 'attention_center_id');
    }

    public function healthCarer(){
        return $this->belongsTo(HealthCarer::class, 'health_carer_id');
    }
}

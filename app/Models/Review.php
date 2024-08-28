<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['id','review','patient_id','attention_center_id'];

    public function attentionCenter(){
        return $this->belongsTo(Attentioncenter::class,'attention_center_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
}

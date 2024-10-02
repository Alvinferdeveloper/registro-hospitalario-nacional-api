<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['entity_id','entity_type', 'image_url'];
    public function hospital(){
        return $this->belongsTo(Hospital::class, 'entity_id');
    }
    

}

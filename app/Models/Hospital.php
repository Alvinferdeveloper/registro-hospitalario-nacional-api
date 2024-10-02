<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $fillable = ['name','address_id','phone_number','email','emergency_number','lat','lng'];

    public function images(){
        return $this->hasMany(Image::class,'entity_id');
    }
    public function address(){
        return $this->belongsTo(Address::class,'address_id');
    }
}

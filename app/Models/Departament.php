<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $fillable = ['id', 'name'];
    public function addresses(){
        return $this->hasMany(Address::class, 'departament_id');
    }  
    
    
}
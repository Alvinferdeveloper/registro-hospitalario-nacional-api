<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = 
    ['id','name','lastName','identification','phone_number'
    ,'email','password'];

    public function roles(){
        return $this->hasMany(Role::class,'admin_role');
    }

    public function healthCareSystems(){
        return $this->hasMany(HealthcareSystem::class,'admin_id');
    }

    public function healthCarers(){
        return $this->hasMany(HealthCarer::class,'admin_id');
    }

}

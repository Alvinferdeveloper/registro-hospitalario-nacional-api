<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasUuids;
    //protected $keyType = 'string';
    protected $fillable = 
    ['id','name','lastName','identification','phone_number'
    ,'email','password'];

    public function roles(){
        return $this->belongsToMany(Role::class,'admin_roles');
    }

    public function healthCareSystems(){
        return $this->hasMany(HealthcareSystem::class,'admin_id');
    }

    public function healthCarers(){
        return $this->hasMany(HealthCarer::class,'admin_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['id', 'name', 'apellido',
                        'identificacion', 'birth_certificate', 'blood_type',
                        'marital_status','gender','address_id','healthcare_system_id',
                        'created_at','phone_number','profile_photo','nacimiento','role',
                        'email','passwprd' ];
}

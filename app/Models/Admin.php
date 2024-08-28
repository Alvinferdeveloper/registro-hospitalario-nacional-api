<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = 
    ['id','name','lastName','identification','phone_number','created_at','updated_at'
    ,'email','password','role'];

}

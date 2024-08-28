<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attentioncenter extends Model
{
    protected $table= "attention_center";
    protected $fillable = ['id', 'name', 'tipo','address_id','healthcare_system_id',
                            'lat','ing'];
}

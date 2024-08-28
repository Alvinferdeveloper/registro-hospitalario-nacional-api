<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = ['id','departament_id','municipio','city','address'];

    public function departament(){
        return $this->BelongsTo(Departament::class);
    }
}

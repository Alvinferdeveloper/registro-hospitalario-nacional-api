<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   protected $fillable =
   ['id','name'];

   public function admins(){
      return $this->belongsToMany(Admin::class, 'admin_roles');
   }

   public function healthCarers(){
      return $this->belongsToMany(HealthCarer::class, 'admin_roles');
   }
}

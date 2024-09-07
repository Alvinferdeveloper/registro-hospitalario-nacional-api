<?php
namespace App\Services;

use App\Models\HealthCarer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HealthCarerService{
    public static function healtCarerRegistered($userName, $password){
        $healthCarer = HealthCarer::where('email', $userName)->first();
        if($healthCarer && Hash::check($password, $healthCarer->password)){
            return $healthCarer;
        }
        return null;
    }
    public static function registerHealthCarer($healthCarer, $user){
        $user->load('roles');
        if($user->roles()->where('name', 'Admin')->exists()){
            $healthCarer['admin_creator'] = $user->id;
        }
        else{
            $healthCarer['health_carer_creator'] = $user->id;
        } 

        $healthCarer['healthcare_system_id']= $user->healthcare_system_id;
        $healthCarer['password'] = Str::random(8);
        return HealthCarer::create($healthCarer);
    }
}
?>
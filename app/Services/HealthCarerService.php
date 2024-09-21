<?php

namespace App\Services;

use App\Models\Attentioncenter;
use App\Models\HealthCarer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class HealthCarerService
{
    public static function healtCarerRegistered($userName, $password)
    {
        $healthCarer = HealthCarer::where('email', $userName)->first();
        if ($healthCarer && Hash::check($password, $healthCarer->password)) {
            return $healthCarer;
        }
        return null;
    }

    //allowed to only global Admins
    public static function registerHealthCarerByAdmin($healthCarer, $user)
    {
        $healthCarer['admin_creator'] = $user->id;
        $roles = $healthCarer['roles'];
        $healthCarer['healthcare_system_id'] = $user->healthcare_system_id;
        $healthCarer['password'] = Str::random(8);
        $healthCarerDoc = HealthCarer::create($healthCarer);
        $healthCarerDoc->roles()->attach($roles);
        return $healthCarerDoc;
    }

    //Allowed to HealthCares with enough permissions
    public static function registerHealthCarerByHealthCarer($healthCarer, $user)
    {
        $healthCarer['health_carer_creator'] = $user->id;
        $roles = $healthCarer['roles'];
        $healthCarer['healthcare_system_id'] = $user->healthcare_system_id;
        $attentionCenterExist = Attentioncenter::where(['id' => $healthCarer['attention_center_id'], 'healthcare_system_id' => $user->healthcare_system_id])->first();
        if(!$attentionCenterExist) throw new ModelNotFoundException();
        $healthCarer['password'] = Str::random(8);
        $healthCarerDoc = HealthCarer::create($healthCarer);
        $healthCarerDoc->roles()->attach($roles);
        return $healthCarerDoc;
    }

    public static function getHealthCarer($healthCarerId)
    {
        $healthCarer = HealthCarer::find($healthCarerId);
        return $healthCarer;
    }
}

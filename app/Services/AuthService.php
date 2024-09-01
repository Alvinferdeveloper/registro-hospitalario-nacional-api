<?php
namespace App\Services;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthService{
    public static function registerPatient($patient, $addressId){
        return Patient::create([
            'id' => Str::uuid(),
            'name' => $patient['name'],
            'lastName' => $patient['lastName'],
            'identification' => $patient['identification'],
            'birth_certificate' => $patient['birth_certificate'],
            'blood_type' => $patient['blood_type'],
            'marital_status' => $patient['marital_status'],
            'gender' => $patient['gender'],
            'address_id' => $addressId,
            'phone_number' => $patient['phone_number'],
            'birthdate' => $patient['birthdate'],
            'email' => $patient['email'],
            'password' => Hash::make($patient['password'])
        ]);
    }
}
?>
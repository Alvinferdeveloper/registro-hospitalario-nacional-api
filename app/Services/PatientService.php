<?php
namespace App\Services;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PatientService{
    public static function patientRegistered($userName, $password){
        $patient = Patient::where('email', $userName)->first();
        if($patient && Hash::check($password, $patient->password)){
            return $patient;
        }
        return null;
    }

    public static function registerPatient($patient, $addressId){
        return Patient::create([
            'id' => Str::uuid(),
            'name' => $patient['name'],
            'lastName' => $patient['lastName'],
            'identification' => $patient['identification'],
            'blood_type' => $patient['blood_type'],
            'marital_status' => $patient['marital_status'],
            'gender' => $patient['gender'],
            'address_id' => $addressId,
            'phone_number' => $patient['phone_number'],
            'birthdate' => $patient['birthDate'],
            'email' => $patient['email'],
            'password' => Hash::make($patient['password'])
        ]);
    }
}
?>
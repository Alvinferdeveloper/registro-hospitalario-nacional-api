<?php
namespace App\Services;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PatientService{
    const PATIENTS_PER_PAGE = 10;
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
            'password' => Hash::make($patient['password']),
            'profile_photo' => "https://lmytqidhsbbnxltkcbsz.supabase.co/storage/v1/object/sign/patientsProfile/patientProfile.jpg?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJwYXRpZW50c1Byb2ZpbGUvcGF0aWVudFByb2ZpbGUuanBnIiwiaWF0IjoxNzI2NTMyMjk0LCJleHAiOjE3NTgwNjgyOTR9.i4zCNC30IPqrYMcuLD4DZG2jWb26iTNaOdYkSj5Qg8M&t=2024-09-17T00%3A18%3A23.709Z"
        ]);
    }

    public static function searchPatients($search, $page){
        $query = Patient::when($search, function ($q) use ($search) {
            return $q->where('name', 'LIKE', '%' . $search . '%')
                     ->orWhere('identification', 'LIKE', '%' . $search . '%')
                     ->orWhere('email', 'LIKE', '%' . $search . '%');
        });
    
        // Paginar el resultado
        $paginatedResult =  $query->paginate(self::PATIENTS_PER_PAGE, ['*'], 'page', $page);
         $patients = $paginatedResult->map(function ($item) {
            unset($item['password']); 
            return $item;
        });

        return $patients;
    }
}
?>
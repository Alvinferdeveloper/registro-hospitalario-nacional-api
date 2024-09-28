<?php

namespace Database\Seeders;

use App\Models\HealthcareSystem;
use App\Models\Vaccine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $healtCareSystem = HealthcareSystem::first();
        Vaccine::insert([
            [
                'name' => 'Astrazeneca',
                'doses' => 3,
                'healthcare_system_id' => $healtCareSystem->id

            ],
            [
                'name' => 'Hepatitis A',
                'doses' => 3,
                'healthcare_system_id' => $healtCareSystem->id

            ],
            [
                'name' => 'Rotavirus',
                'doses' => 2,
                'healthcare_system_id' => $healtCareSystem->id

            ],
            
            
        ]);
    }
}

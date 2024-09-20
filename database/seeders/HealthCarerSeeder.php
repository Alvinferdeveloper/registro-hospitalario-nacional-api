<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Attentioncenter;
use App\Models\HealthCarer;
use App\Models\HealthcareSystem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HealthCarerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $id = HealthcareSystem::first()->id;
        $adminCreatorId = Admin::first()->id;
        HealthCarer::create([
            "name" => "John",
            "lastName" => "Doe",
            "identification" => "1234567891012",
            "birthdate" => "1990-05-15",
            "area" => "MEDICINA INTERNA",
            'admin_creator' => $adminCreatorId,
            "type" => "DOCTOR",
            'healthcare_system_id' => $id,
            "phone_number" => "83456789",
            'password' => Hash::make('12345678'),
            "email" => "johndoe@example.com",
            "active" => true
        ]);
    }
}

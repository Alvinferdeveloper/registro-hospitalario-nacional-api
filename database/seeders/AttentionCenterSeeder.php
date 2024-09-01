<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Admin;
use App\Models\Attentioncenter;
use App\Models\HealthcareSystem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AttentionCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $address = Address::first();
        $healthCareSystem = HealthcareSystem::first();
        Attentioncenter::create([
            'id' => Str::uuid(),
            'name' => 'HEODRA',
            'type' => 'HOSPITAL',
            'address_id' => $address->id,
            'healthcare_system_id' => $healthCareSystem->id,
            'lat'=>'12.434885414384183',
            'lng' => '-86.87784176747388',
        ]);
    }
}

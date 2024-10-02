<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class hospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $address = Address::first();
        Hospital::create([
            'name' => 'HEODRA',
            'address_id' => $address->id,
            'phone_number' => '0050583281195',
            'email' => 'eodra@gmail.com',
            'emergency_number' => '0050583281195',
            'lat' => '12.434885414384183',
            'lng' => '-86.87784176747388'
        ]);



    }
}

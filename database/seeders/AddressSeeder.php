<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Address::create([
            'departament_id' => 11,
            'municipio' => 'Leon',
            'city' => 'Leon',
            'address' => 'Mercado central 1C al sur 1C abajo',
        ]);
    }
}

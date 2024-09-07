<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Departament;
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
        $departament = Departament::first();
        Address::create([
            'departament_id' => $departament->id,
            'municipio' => 'Boaco',
            'city' => 'Leon',
            'address' => 'Mercado central 1C al sur 1C abajo',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $departaments = [
            ['name' => 'Boaco'],
            ['name' => 'Carazo'],
            ['name' => 'Chinandega'],
            ['name' => 'Chontales'],
            ['name' => 'Granada'],
            ['name' => 'Esteli'],
            ['name' => 'Costa caribe norte'],
            ['name' => 'Costa caribe sur'],
            ['name' => 'Jinotega'],
            ['name' => 'León'],
            ['name' => 'Madriz'],
            ['name' => 'Managua'],
            ['name' => 'Masaya'],
            ['name' => 'Matagalpa'],
            ['name' => 'Nueva Segovia'],
            ['name' => 'Rivas'],
            ['name' => 'Río San Juan'],
            
        ];
        
            foreach($departaments as $departament){
                Departament::create($departament);
            }
        
    }
}

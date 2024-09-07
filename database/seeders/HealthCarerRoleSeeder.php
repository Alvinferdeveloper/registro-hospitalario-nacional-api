<?php

namespace Database\Seeders;

use App\Models\HealthCarer;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HealthCarerRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $healthCarer = HealthCarer
        ::first();
        $role = Role::where('name', 'HealthCarerAdmin')->first();
        $healthCarer->roles()->attach($role->id);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Role::insert([
            [
                'name' =>'SuperAdmin',
                'for' => 'ADMIN'
            ],
            [
                'name' => 'Admin',
                'for' => 'ADMIN'
            ],
            [
                'name' => 'HealthCarerAdmin',
                'for' => 'HEALTH_CARER'
            ],
            [
                'name' => 'HealthCarerAssistant',
                'for' => 'HEALTH_CARER'
            ]
            ]);
    }
}

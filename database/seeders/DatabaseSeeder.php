<?php

namespace Database\Seeders;

use App\Models\HealthcareSystem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([
            AdminSeeder::class,
            DepartamentSeeder::class,
            AddressSeeder::class,
            RoleSeeder::class,
            AdminRoleSeeder::class,
            HealthCareSystemSeeder::class,
            AttentionCenterSeeder::class, 
            HealthCarerSeeder::class,
            HealthCarerRoleSeeder::class,

        ]);
    }
}

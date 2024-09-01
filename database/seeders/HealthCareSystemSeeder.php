<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\HealthcareSystem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Str;

class HealthCareSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Admin::first();
        HealthcareSystem::create([
            'id' => Str::uuid(),
            'name' => 'Sistema de salud publica de Nicaragua',
            'admin_creator' => $admin->id
        ]);
    }
}

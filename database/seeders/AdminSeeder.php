<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Admin::create([
            'id' => Str::uuid(),
            'name' => 'Albin Dario',
            'lastName' => 'Fernandez Galeano',
            'identification' => '888-200402-1000P',
            'phone_number' => '83281195',
            'email' => 'alvinfer67@gmail.com',
            'password' => Hash::make('123qwe')
        ]);
    }
}

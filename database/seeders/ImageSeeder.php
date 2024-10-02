<?php

namespace Database\Seeders;

use App\Models\Hospital;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $hospital = Hospital::first();
        Image::create([
            'entity_id' => $hospital->id,
            'entity_type' => 'Hospital',
            'image_url' => 'https://lmytqidhsbbnxltkcbsz.supabase.co/storage/v1/object/public/hospital_images/hospital1.jpg?t=2024-10-02T03%3A06%3A51.503Z'
        ]);
        Image::create([
            'entity_id' => $hospital->id,
            'entity_type' => 'Hospital',
            'image_url' => 'https://lmytqidhsbbnxltkcbsz.supabase.co/storage/v1/object/public/hospital_images/hospital2.jpg?t=2024-10-02T03%3A07%3A37.117Z'
        ]);
        Image::create([
            'entity_id' => $hospital->id,
            'entity_type' => 'Hospital',
            'image_url' => 'https://lmytqidhsbbnxltkcbsz.supabase.co/storage/v1/object/public/hospital_images/hospital3.jpg?t=2024-10-02T03%3A08%3A06.612Z'
        ]);
        
    }
}

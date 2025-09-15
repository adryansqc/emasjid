<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jumatan; // Import the Jumatan model

class JumatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jumatan::create([
            'user_id' => 1,
            'tanggal' => '2024-06-07',
            'khatib' => 'Ustadz Fulan',
            'muadzin' => 'Bapak Alan',
        ]);
    }
}

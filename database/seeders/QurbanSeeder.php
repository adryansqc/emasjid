<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Qurban; // Import the Qurban model

class QurbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Qurban::create([
            'user_id' => 1,
            'nama_peserta' => 'Budi Santoso',
            'jenis_hewan' => 'Sapi',
            'jumlah_uang' => 3500000.00,
            'kelompok' => 1,
        ]);
    }
}

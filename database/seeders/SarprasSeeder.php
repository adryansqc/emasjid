<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sarpras; // Import the Sarpras model

class SarprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sarpras::create([
            'user_id' => 1,
            'nama_barang' => 'Karpet Masjid',
            'jumlah' => 10,
            'kondisi' => 'baik',
            'lokasi_penyimpanan' => 'Ruang Utama',
        ]);
    }
}

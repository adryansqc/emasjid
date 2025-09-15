<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Zakat; // Import the Zakat model

class ZakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Zakat::create([
            'user_id' => 1,
            'nama_muzakki' => 'Fatimah Azzahra',
            'jenis_zakat' => 'fitrah',
            'jumlah_uang' => 50000,
            'tanggal_bayar' => '2024-04-05',
        ]);
    }
}

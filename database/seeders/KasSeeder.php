<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kas; // Import the Kas model

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kas::create([
            'user_id' => 1,
            'tanggal' => '2024-06-01',
            'keterangan' => 'Saldo Awal Kas Masjid',
            'debit' => 5000000.00,
            'kredit' => null,
            'saldo' => 5000000.00,
        ]);
    }
}

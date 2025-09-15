<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kajian; // Import the Kajian model

class KajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kajian::create([
        //     'user_id' => 1,
        //     'nama_kegiatan' => 'Kajian Rutin Subuh',
        //     'tanggal' => '2024-06-10 05:00:00',
        //     'keterangan' => 'Pengalan kajian rutin subuh untuk anggota masjid yang baru bergabung dalam masjid kami yang beralamat di Jalan Raya Masjid.',
        //     'tempat' => 'Ruang Utama Masjid',
        // ]);

        $kajians = [
            [
                'user_id' => 1,
                'nama_kegiatan' => 'Kajian Rutin Subuh',
                'tanggal' => '2024-06-10 05:00:00',
                'keterangan' => 'Pengalan kajian rutin subuh untuk anggota masjid yang baru bergabung dalam masjid kami yang beralamat di Jalan Raya Masjid.',
                'tempat' => 'Ruang Utama Masjid',
            ],
            [
                'user_id' => 1,
                'nama_kegiatan' => 'Kajian Malam Jumat',
                'tanggal' => '2024-06-13 19:45:00',
                'keterangan' => 'Kajian tematik membahas sirah nabawiyah dalam masjid yang beralamat di Jalan Masjid.',
                'tempat' => 'Aula Masjid',
            ],
            [
                'user_id' => 1,
                'nama_kegiatan' => 'Kajian Bada Dzuhur',
                'tanggal' => '2024-06-11 13:30:00',
                'keterangan' => 'Kajian singkat setelah shalat Dzuhur membahas fiqh ibadah dalam masjid yang beralamat di Jalan Masjid.',
                'tempat' => 'Ruang Tengah Masjid',
            ],
        ];
        foreach ($kajians as $kajian) {
            Kajian::updateOrCreate($kajian);
        }
    }
}

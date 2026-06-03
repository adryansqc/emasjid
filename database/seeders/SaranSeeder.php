<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Saran;

class SaranSeeder extends Seeder
{
    public function run(): void
    {
        $sarans = [
            [
                'nama'     => 'Ahmad Fauzi',
                'email'    => 'ahmad@gmail.com',
                'no_hp'    => '081234567890',
                'kategori' => 'saran',
                'pesan'    => 'Sebaiknya masjid menambah jadwal kajian rutin setiap minggu agar jamaah lebih aktif.',
                'status'   => 'belum_dibaca',
            ],
            [
                'nama'     => 'Siti Rahmah',
                'email'    => 'siti@gmail.com',
                'no_hp'    => '082345678901',
                'kategori' => 'masukan',
                'pesan'    => 'Tempat wudhu perlu diperbanyak karena sering antri saat waktu shalat Jumat.',
                'status'   => 'belum_dibaca',
            ],
            [
                'nama'     => 'Budi Santoso',
                'email'    => null,
                'no_hp'    => '083456789012',
                'kategori' => 'kritik',
                'pesan'    => 'Sound system masjid sering bermasalah saat adzan, mohon segera diperbaiki.',
                'status'   => 'sudah_dibaca',
            ],
            [
                'nama'     => 'Nur Hidayah',
                'email'    => 'nur@gmail.com',
                'no_hp'    => null,
                'kategori' => 'pertanyaan',
                'pesan'    => 'Apakah masjid menerima donasi untuk pembangunan perpustakaan islami?',
                'status'   => 'belum_dibaca',
            ],
            [
                'nama'     => 'Rizki Pratama',
                'email'    => 'rizki@gmail.com',
                'no_hp'    => '084567890123',
                'kategori' => 'saran',
                'pesan'    => 'Mohon disediakan area khusus anak-anak agar tidak mengganggu jamaah dewasa saat shalat.',
                'status'   => 'sudah_dibaca',
            ],
        ];

        foreach ($sarans as $saran) {
            Saran::updateOrCreate(
                ['nama' => $saran['nama'], 'pesan' => $saran['pesan']],
                $saran
            );
        }
    }
}

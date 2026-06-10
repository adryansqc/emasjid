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
                'nama'                 => 'Ahmad Fauzi',
                'email'                => 'ahmad@gmail.com',
                'no_hp'                => '081234567890',
                'kategori'             => 'saran',
                'pesan'                => 'Sebaiknya masjid menambah jadwal kajian rutin setiap minggu agar jamaah lebih aktif.',
                'status_baca'          => 'belum_dibaca',
                'status_persetujuan'   => 'menunggu',
            ],
            [
                'nama'                 => 'Siti Rahmah',
                'email'                => 'siti@gmail.com',
                'no_hp'                => '082345678901',
                'kategori'             => 'masukan',
                'pesan'                => 'Tempat wudhu perlu diperbanyak karena sering antri saat waktu shalat Jumat.',
                'status_baca'          => 'belum_dibaca',
                'status_persetujuan'   => 'disetujui',
            ],
            [
                'nama'                 => 'Budi Santoso',
                'email'                => null,
                'no_hp'                => '083456789012',
                'kategori'             => 'masukan',
                'pesan'                => 'Sound system masjid sering bermasalah saat adzan, mohon segera diperbaiki.',
                'status_baca'          => 'sudah_dibaca',
                'status_persetujuan'   => 'disetujui',
            ],
            [
                'nama'                 => 'Nur Hidayah',
                'email'                => 'nur@gmail.com',
                'no_hp'                => null,
                'kategori'             => 'pertanyaan',
                'pesan'                => 'Apakah masjid menerima donasi untuk pembangunan perpustakaan islami?',
                'status_baca'          => 'belum_dibaca',
                'status_persetujuan'   => 'menunggu',
            ],
            [
                'nama'                 => 'Rizki Pratama',
                'email'                => 'rizki@gmail.com',
                'no_hp'                => '084567890123',
                'kategori'             => 'saran',
                'pesan'                => 'Mohon disediakan area khusus anak-anak agar tidak mengganggu jamaah dewasa saat shalat.',
                'status_baca'          => 'sudah_dibaca',
                'status_persetujuan'   => 'tidak_disetujui',
            ],
            [
                'nama'                 => 'Fatimah Zahra',
                'email'                => 'fatimah@gmail.com',
                'no_hp'                => '085678901234',
                'kategori'             => 'saran',
                'pesan'                => 'Masjid sebaiknya memiliki website atau media sosial yang aktif untuk informasi kegiatan.',
                'status_baca'          => 'belum_dibaca',
                'status_persetujuan'   => 'menunggu',
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

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $announcements = [
            [
                'user_id' => 1,
                'judul' => 'Pengumuman Penting',
                'isi' => 'Ini adalah contoh isi pengumuman. Harap diperhatikan oleh seluruh jamaah masjid.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Pengumuman Lain',
                'isi' => 'Contoh isi pengumuman lainnya. Harap diperhatikan oleh seluruh jamaah.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Pengumuman Masjid',
                'isi' => 'Pengumuman resmi dari pengurus masjid. Harap diperhatikan oleh seluruh jamaah.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Jadwal Sholat Jumat',
                'isi' => 'Sholat Jumat akan dilaksanakan pukul 12.00 WIB. Jamaah diharapkan hadir lebih awal.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Kegiatan Ramadan',
                'isi' => 'Selama bulan Ramadan akan diadakan tarawih berjamaah setiap malam pukul 20.00 WIB.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Pengajian Rutin Mingguan',
                'isi' => 'Pengajian rutin mingguan akan diadakan setiap Ahad pagi pukul 08.00 WIB di aula masjid.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Penerimaan Zakat Fitrah',
                'isi' => 'Panitia zakat masjid membuka penerimaan zakat fitrah mulai 1 Ramadan hingga sebelum sholat Idul Fitri.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Renovasi Masjid',
                'isi' => 'Akan dilaksanakan renovasi bagian selasar masjid. Jamaah diharapkan maklum atas ketidaknyamanan yang ada.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Donasi Pembangunan',
                'isi' => 'Kami membuka donasi untuk pembangunan menara masjid. Donasi dapat diserahkan langsung ke pengurus masjid.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Peringatan Hari Besar Islam',
                'isi' => 'Akan diadakan peringatan Maulid Nabi Muhammad SAW pada tanggal yang akan ditentukan. Seluruh jamaah diundang hadir.',
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::updateOrCreate(
                ['judul' => $announcement['judul']],
                $announcement
            );
        }
    }
}

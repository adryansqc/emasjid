<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Announcement::create([
        //     'user_id' => 1,
        //     'judul' => 'Pengumuman Penting',
        //     'isi' => 'Ini adalah contoh isi pengumuman. Harap diperhatikan oleh seluruh jamaah.',
        // ]);

        $announcements = [
            [
                'user_id' => 1,
                'judul' => 'Pengumuman Penting',
                'isi' => 'Ini adalah contoh isi pengumuman. Harap diperhatikan oleh seluruh jamaah.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Pengumuman lain',
                'isi' => 'contoh isi pengumuman. Harap diperhatikan oleh seluruh jamaah.',
            ],
            [
                'user_id' => 1,
                'judul' => 'Pengumuman masjid',
                'isi' => 'pengumuman masjid. Harap diperhatikan oleh seluruh jamaah.',
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::updateOrCreate($announcement);
        }
    }
}

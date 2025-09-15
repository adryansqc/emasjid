<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Masjid;

class MasjidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Masjid::create([
            'user_id' => 1,
            'nama' => 'Masjid Al-Barokah',
            'alamat' => 'Jl. Contoh Alamat No. 1',
            'url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23349.00650995004!2d102.80039281965921!3d-2.168823270213839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2fcb3b216b8ae1%3A0x95709a1b6c162a15!2sMasjid%20Nurul%20Islam!5e0!3m2!1sen!2sid!4v1749002449001!5m2!1sen!2sid',
            'kontak' => '081234567890',
        ]);
    }
}

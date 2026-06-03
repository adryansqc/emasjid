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
            'nama' => 'Masjid Nurul Falah',
            'alamat' => 'RT. 11, Desa Sungai Gelam, Kecamatan Sungai Gelam, Kabupaten Muaro Jambi, Provinsi Jambi',
            'url' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3988.044217221414!2d103.73672507496649!3d-1.7087030482754944!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e259caf482bda0b%3A0xd1f4ef9a6cceea2!2sMESJID%20NURUL%20FALAH!5e0!3m2!1sid!2sid!4v1780469382692!5m2!1sid!2sid',
            'kontak' => '081234567890',
        ]);
    }
}

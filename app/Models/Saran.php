<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $table = 'sarans';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'kategori',
        'pesan',
        'status_baca',
        'status_persetujuan',
    ];

    public function getKategoriLabelAttribute(): string
    {
        return match ($this->kategori) {
            'saran'       => 'Saran',
            'masukan'     => 'Masukan',
            'pertanyaan'  => 'Pertanyaan',
            default       => '-',
        };
    }

    public function getStatusBacaLabelAttribute(): string
    {
        return match ($this->status_baca) {
            'belum_dibaca' => 'Belum Dibaca',
            'sudah_dibaca' => 'Sudah Dibaca',
            default        => '-',
        };
    }

    public function getStatusPersetujuanLabelAttribute(): string
    {
        return match ($this->status_persetujuan) {
            'menunggu'          => 'Menunggu',
            'disetujui'         => 'Disetujui',
            'tidak_disetujui'   => 'Tidak Disetujui',
            default             => '-',
        };
    }

    public function getStatusPersetujuanBadgeAttribute(): string
    {
        return match ($this->status_persetujuan) {
            'menunggu'          => 'warning',
            'disetujui'         => 'success',
            'tidak_disetujui'   => 'danger',
            default             => 'secondary',
        };
    }
}

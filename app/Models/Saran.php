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
        'status',
    ];

    public function getKategoriLabelAttribute(): string
    {
        return match ($this->kategori) {
            'saran'       => 'Saran',
            'masukan'     => 'Masukan',
            'kritik'      => 'Kritik',
            'pertanyaan'  => 'Pertanyaan',
            default       => '-',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'belum_dibaca' => 'Belum Dibaca',
            'sudah_dibaca' => 'Sudah Dibaca',
            default        => '-',
        };
    }
}

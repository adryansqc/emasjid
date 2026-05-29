<?php

namespace App\Filament\Widgets;

use App\Models\Announcement;
use App\Models\Kajian;
use App\Models\Kas;
use App\Models\Jumatan;
use App\Models\Qurban;
use App\Models\Zakat;
use App\Models\Sarpras;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $saldo = Kas::latest()->first()?->saldo ?? 0;
        $totalZakat = Zakat::sum('jumlah_uang');
        $totalQurban = Qurban::sum('jumlah_uang');
        $sarprasRusak = Sarpras::where('kondisi', 'rusak')->count();

        return [
            Stat::make('Total Kajian', Kajian::count())
                ->description('Agenda kegiatan terdaftar')
                ->descriptionIcon('heroicon-o-book-open')
                ->color('success'),

            Stat::make('Total Pengumuman', Announcement::count())
                ->description('Berita acara terdaftar')
                ->descriptionIcon('heroicon-o-megaphone')
                ->color('info'),

            Stat::make('Saldo Kas', 'Rp ' . number_format($saldo, 0, ',', '.'))
                ->description('Saldo kas terakhir')
                ->descriptionIcon('heroicon-o-banknotes')
                ->color('warning'),

            Stat::make('Total Zakat', 'Rp ' . number_format($totalZakat, 0, ',', '.'))
                ->description('Total zakat terkumpul')
                ->descriptionIcon('heroicon-o-hand-raised')
                ->color('success'),

            Stat::make('Total Qurban', 'Rp ' . number_format($totalQurban, 0, ',', '.'))
                ->description('Total dana qurban')
                ->descriptionIcon('heroicon-o-heart')
                ->color('danger'),

            Stat::make('Jumatan', Jumatan::count())
                ->description('Total data jumatan')
                ->descriptionIcon('heroicon-o-calendar-days')
                ->color('info'),

            Stat::make('Peserta Qurban', Qurban::count())
                ->description('Total peserta qurban')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('warning'),

            Stat::make('Sarpras Rusak', $sarprasRusak)
                ->description('Barang kondisi rusak')
                ->descriptionIcon('heroicon-o-wrench-screwdriver')
                ->color($sarprasRusak > 0 ? 'danger' : 'success'),
        ];
    }
}

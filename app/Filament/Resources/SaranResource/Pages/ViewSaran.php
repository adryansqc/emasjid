<?php

namespace App\Filament\Resources\SaranResource\Pages;

use App\Filament\Resources\SaranResource;
use App\Models\Saran;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;

class ViewSaran extends ViewRecord
{
    protected static string $resource = SaranResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Pengirim')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('nama')
                                    ->label('Nama'),

                                TextEntry::make('email')
                                    ->label('Email')
                                    ->default('-'),

                                TextEntry::make('no_hp')
                                    ->label('No. HP')
                                    ->default('-'),
                            ]),
                    ]),

                Section::make('Detail Pesan')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('kategori')
                                    ->label('Kategori')
                                    ->badge()
                                    ->color(fn(string $state): string => match ($state) {
                                        'saran'      => 'info',
                                        'masukan'    => 'success',
                                        'kritik'     => 'danger',
                                        'pertanyaan' => 'warning',
                                        default      => 'gray',
                                    })
                                    ->formatStateUsing(fn(string $state): string => match ($state) {
                                        'saran'      => 'Saran',
                                        'masukan'    => 'Masukan',
                                        'kritik'     => 'Kritik',
                                        'pertanyaan' => 'Pertanyaan',
                                        default      => $state,
                                    }),

                                TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->color(fn(string $state): string => match ($state) {
                                        'belum_dibaca' => 'danger',
                                        'sudah_dibaca' => 'success',
                                        default        => 'gray',
                                    })
                                    ->formatStateUsing(fn(string $state): string => match ($state) {
                                        'belum_dibaca' => 'Belum Dibaca',
                                        'sudah_dibaca' => 'Sudah Dibaca',
                                        default        => $state,
                                    }),
                            ]),

                        TextEntry::make('pesan')
                            ->label('Pesan')
                            ->columnSpanFull(),

                        TextEntry::make('created_at')
                            ->label('Dikirim Pada')
                            ->dateTime('d F Y, H:i')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('tandai_dibaca')
                ->label('Tandai Sudah Dibaca')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->visible(fn() => $this->record->status === 'belum_dibaca')
                ->action(function () {
                    $this->record->update(['status' => 'sudah_dibaca']);
                    $this->refreshFormData(['status']);
                }),
        ];
    }
}

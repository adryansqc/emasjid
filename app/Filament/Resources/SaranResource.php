<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaranResource\Pages;
use App\Filament\Resources\SaranResource\RelationManagers;
use App\Models\Saran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaranResource extends Resource
{
    protected static ?string $model = Saran::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Lainnya';

    protected static ?string $modelLabel = 'Saran & Masukan';

    protected static ?string $pluralModelLabel = 'Saran & Masukan';

    protected static ?int $navigationSort = 10;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status_baca', 'belum_dibaca')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->default('-'),

                TextColumn::make('no_hp')
                    ->label('No. HP')
                    ->default('-'),

                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'saran'      => 'info',
                        'masukan'    => 'success',
                        'pertanyaan' => 'warning',
                        default      => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'saran'      => 'Saran & Kritik',
                        'masukan'    => 'Masukan',
                        'pertanyaan' => 'Pertanyaan',
                        default      => $state,
                    }),

                TextColumn::make('pesan')
                    ->label('Pesan')
                    ->limit(60)
                    ->tooltip(fn($record) => $record->pesan),

                TextColumn::make('status_baca')
                    ->label('Status Baca')
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

                TextColumn::make('status_persetujuan')
                    ->label('Status Persetujuan')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'menunggu'        => 'warning',
                        'disetujui'       => 'success',
                        'tidak_disetujui' => 'danger',
                        default           => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'menunggu'        => 'Menunggu',
                        'disetujui'       => 'Disetujui',
                        'tidak_disetujui' => 'Tidak Disetujui',
                        default           => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('Dikirim')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'saran'      => 'Saran & Kritik',
                        'masukan'    => 'Masukan',
                        'pertanyaan' => 'Pertanyaan',
                    ]),

                SelectFilter::make('status_baca')
                    ->label('Status Baca')
                    ->options([
                        'belum_dibaca' => 'Belum Dibaca',
                        'sudah_dibaca' => 'Sudah Dibaca',
                    ]),

                SelectFilter::make('status_persetujuan')
                    ->label('Status Persetujuan')
                    ->options([
                        'menunggu'        => 'Menunggu',
                        'disetujui'       => 'Disetujui',
                        'tidak_disetujui' => 'Tidak Disetujui',
                    ]),
            ])
            ->actions([
                Action::make('tandai_dibaca')
                    ->label('Tandai Dibaca')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn(Saran $record) => $record->status_baca === 'belum_dibaca')
                    ->action(fn(Saran $record) => $record->update(['status_baca' => 'sudah_dibaca'])),

                Action::make('setujui')
                    ->label('Setujui')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn(Saran $record) => $record->status_persetujuan === 'menunggu')
                    ->action(fn(Saran $record) => $record->update(['status_persetujuan' => 'disetujui'])),

                Action::make('tolak')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->visible(fn(Saran $record) => $record->status_persetujuan === 'menunggu')
                    ->action(fn(Saran $record) => $record->update(['status_persetujuan' => 'tidak_disetujui'])),

                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc')
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSarans::route('/'),
            'create' => Pages\CreateSaran::route('/create'),
            'view' => Pages\ViewSaran::route('/{record}'),
            'edit' => Pages\EditSaran::route('/{record}/edit'),
        ];
    }
}

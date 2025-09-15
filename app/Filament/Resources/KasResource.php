<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KasResource\Pages;
use App\Filament\Resources\KasResource\RelationManagers;
use App\Models\Kas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Hidden; // Import Hidden
use Filament\Forms\Components\TextInput; // Import TextInput
use Filament\Forms\Components\DatePicker; // Import DatePicker
use Filament\Forms\Components\Textarea; // Import Textarea
use Illuminate\Support\Facades\Auth; // Import Auth
use Filament\Forms\Components\Placeholder; // Import Placeholder - No longer needed for saldo display, but might be used elsewhere
use Filament\Forms\Components\Fieldset; // Import Fieldset

class KasResource extends Resource
{
    protected static ?string $model = Kas::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Keuangan';

    public static function form(Form $form): Form
    {
        $getPreviousSaldo = function ($record = null) {
            if ($record && $record->exists) {
                $previousKas = \App\Models\Kas::where(function ($query) use ($record) {
                    $query->where('tanggal', '<', $record->tanggal)
                        ->orWhere(function ($query) use ($record) {
                            $query->where('tanggal', $record->tanggal)
                                ->where('id', '<', $record->id);
                        });
                })
                    ->latest('tanggal')
                    ->latest('id')
                    ->first();

                return $previousKas ? $previousKas->saldo : 0;
            } else {
                $latestKas = \App\Models\Kas::latest()->first();
                return $latestKas ? $latestKas->saldo : 0;
            }
        };

        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(fn() => Auth::user()->id)
                    ->required()
                    ->dehydrated(),
                DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),
                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->required()
                    ->maxLength(65535),

                Fieldset::make('Transaksi dan Saldo')

                    ->schema([

                        Placeholder::make('Petunjuk Pengisian')
                            ->content('Isi salah satu antara Pemasukan atau Pengeluaran, tidak bisa diisi keduanya. Saldo otomatis dihitung dari Pengeluaran/Pemasukan sebelumnya.')
                            ->columnSpanFull(),

                        TextInput::make('debit')
                            ->label('Pemasukan')
                            ->numeric()
                            ->prefix('Rp.')
                            ->nullable()
                            ->live(onBlur: true)
                            ->disabled(fn(callable $get) => (float) $get('kredit') > 0)
                            ->afterStateUpdated(function ($state, callable $set, callable $get, $record = null) use ($getPreviousSaldo) {
                                $debit = (float) $state;
                                $kredit = (float) $get('kredit');
                                $previousSaldo = $getPreviousSaldo($record);

                                $newSaldo = $previousSaldo + $debit - $kredit;
                                $set('saldo', $newSaldo);
                            }),

                        TextInput::make('kredit')
                            ->label('Pengeluaran')
                            ->numeric()
                            ->prefix('Rp.')
                            ->nullable()
                            ->live(onBlur: true)
                            ->disabled(fn(callable $get) => (float) $get('debit') > 0)
                            ->afterStateUpdated(function ($state, callable $set, callable $get, $record = null) use ($getPreviousSaldo) {
                                $debit = (float) $get('debit');
                                $kredit = (float) $state;
                                $previousSaldo = $getPreviousSaldo($record);

                                $newSaldo = $previousSaldo + $debit - $kredit;
                                $set('saldo', $newSaldo);
                            }),

                        TextInput::make('saldo')
                            ->label('Saldo')
                            ->numeric()
                            ->prefix('Rp.')
                            ->disabled()
                            ->dehydrated()
                            ->default(fn($record = null) => $getPreviousSaldo($record)),
                    ])->columns(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pembuat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('debit')
                    ->label('Pemasukan')
                    ->numeric()
                    ->money('IDR')
                    ->color('success')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kredit')
                    ->label('Pengeluaran')
                    ->numeric()
                    ->color('danger')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('saldo')
                    ->label('Saldo')
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
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
            'index' => Pages\ListKas::route('/'),
            'create' => Pages\CreateKas::route('/create'),
            'edit' => Pages\EditKas::route('/{record}/edit'),
        ];
    }
}

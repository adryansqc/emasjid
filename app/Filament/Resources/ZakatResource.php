<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZakatResource\Pages;
use App\Filament\Resources\ZakatResource\RelationManagers;
use App\Models\Zakat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Hidden; // Import Hidden
use Filament\Forms\Components\TextInput; // Import TextInput
use Filament\Forms\Components\Select; // Import Select
use Filament\Forms\Components\DatePicker; // Import DatePicker
use Illuminate\Support\Facades\Auth; // Import Auth

class ZakatResource extends Resource
{
    protected static ?string $model = Zakat::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(fn() => Auth::user()->id)
                    ->required()
                    ->dehydrated(),
                TextInput::make('nama_muzakki')
                    ->label('Nama Muzakki')
                    ->required()
                    ->maxLength(255),
                Select::make('jenis_zakat')
                    ->label('Jenis Zakat')
                    ->options([
                        'fitrah' => 'Fitrah',
                        'maal' => 'Maal',
                    ])
                    ->required(),
                TextInput::make('jumlah_uang')
                    ->label('Jumlah Uang')
                    ->prefix('Rp.')
                    ->required()
                    ->numeric(),
                DatePicker::make('tanggal_bayar')
                    ->label('Tanggal Bayar')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_muzakki')
                    ->label('Nama Muzakki')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_zakat')
                    ->label('Jenis Zakat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_uang')
                    ->label('Jumlah Uang')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_bayar')
                    ->label('Tanggal Bayar')
                    ->date()
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
            'index' => Pages\ListZakats::route('/'),
            'create' => Pages\CreateZakat::route('/create'),
            'edit' => Pages\EditZakat::route('/{record}/edit'),
        ];
    }
}

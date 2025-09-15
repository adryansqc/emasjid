<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SarprasResource\Pages;
use App\Filament\Resources\SarprasResource\RelationManagers;
use App\Models\Sarpras;
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
use Filament\Forms\Components\TextInput\Mask; // Import Mask for numeric input
use Illuminate\Support\Facades\Auth;

class SarprasResource extends Resource
{
    protected static ?string $model = Sarpras::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Data Masjid';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => Auth::user()->id)
                    ->required()
                    ->dehydrated(),
                TextInput::make('nama_barang')
                    ->required()
                    ->maxLength(255),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
                Select::make('kondisi')
                    ->options([
                        'baik' => 'Baik',
                        'kurang' => 'Kurang',
                        'rusak' => 'Rusak',
                    ])
                    ->required(),
                TextInput::make('lokasi_penyimpanan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_barang')
                    ->label('Nama Barang')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kondisi')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi_penyimpanan')
                    ->label('Lokasi Penyimpanan')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListSarpras::route('/'),
            'create' => Pages\CreateSarpras::route('/create'),
            'edit' => Pages\EditSarpras::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasjidResource\Pages;
use App\Filament\Resources\MasjidResource\RelationManagers;
use App\Models\Masjid;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MasjidResource extends Resource
{
    protected static ?string $model = Masjid::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = 'Data Masjid';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => Auth::user()->id)
                    ->required()
                    ->dehydrated(),
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Masjid')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat Masjid')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('url')
                    ->label('Link Gmpas Masjid')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('kontak')
                    ->label('Kontak Masjid')
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Masjid')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat Masjid')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak')
                    ->label('Kontak Masjid')
                    ->searchable(),
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
            'index' => Pages\ListMasjids::route('/'),
            'create' => Pages\CreateMasjid::route('/create'),
            'edit' => Pages\EditMasjid::route('/{record}/edit'),
        ];
    }
}

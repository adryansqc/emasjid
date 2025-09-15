<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QurbanResource\Pages;
use App\Filament\Resources\QurbanResource\RelationManagers;
use App\Models\Qurban;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Hidden; // Import Hidden
use Filament\Forms\Components\TextInput; // Import TextInput
use Illuminate\Support\Facades\Auth;

class QurbanResource extends Resource
{
    protected static ?string $model = Qurban::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationGroup = 'Kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => Auth::user()->id)
                    ->required()
                    ->dehydrated(),
                TextInput::make('nama_peserta')
                    ->label('Nama Peserta')
                    ->required()
                    ->maxLength(255),
                TextInput::make('jenis_hewan')
                    ->label('Jenis Hewan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('jumlah')
                    ->label('Jumlah Uang')
                    ->prefix('Rp.')
                    ->required()
                    ->numeric(),
                TextInput::make('kelompok')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_peserta')
                    ->label('Nama Peserta')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_hewan')
                    ->label('Jenis Hewan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah Uang')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelompok')
                    ->numeric()
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
            'index' => Pages\ListQurbans::route('/'),
            'create' => Pages\CreateQurban::route('/create'),
            'edit' => Pages\EditQurban::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JumatanResource\Pages;
use App\Filament\Resources\JumatanResource\RelationManagers;
use App\Models\Jumatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker; // Import DatePicker
use Filament\Forms\Components\Hidden; // Import Hidden
use Filament\Forms\Components\TextInput; // Import TextInput
use Illuminate\Support\Facades\Auth;

class JumatanResource extends Resource
{
    protected static ?string $model = Jumatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Kegiatan';
    protected static ?string $navigationLabel = 'Jadwal Jumatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => Auth::user()->id)
                    ->required()
                    ->dehydrated(),
                DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),
                TextInput::make('khatib')
                    ->required()
                    ->maxLength(255),
                TextInput::make('muadzin')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date(),
                Tables\Columns\TextColumn::make('khatib')
                    ->label('Khatib')
                    ->searchable(),
                Tables\Columns\TextColumn::make('muadzin')
                    ->label('Muadzin')
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
            'index' => Pages\ListJumatans::route('/'),
            'create' => Pages\CreateJumatan::route('/create'),
            'edit' => Pages\EditJumatan::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\JumatanResource\Pages;

use App\Filament\Resources\JumatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJumatans extends ListRecords
{
    protected static string $resource = JumatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

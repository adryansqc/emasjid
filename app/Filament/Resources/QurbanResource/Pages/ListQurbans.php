<?php

namespace App\Filament\Resources\QurbanResource\Pages;

use App\Filament\Resources\QurbanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQurbans extends ListRecords
{
    protected static string $resource = QurbanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

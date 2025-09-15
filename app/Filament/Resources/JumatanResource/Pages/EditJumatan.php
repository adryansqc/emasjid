<?php

namespace App\Filament\Resources\JumatanResource\Pages;

use App\Filament\Resources\JumatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJumatan extends EditRecord
{
    protected static string $resource = JumatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

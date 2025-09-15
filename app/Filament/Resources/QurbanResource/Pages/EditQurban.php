<?php

namespace App\Filament\Resources\QurbanResource\Pages;

use App\Filament\Resources\QurbanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQurban extends EditRecord
{
    protected static string $resource = QurbanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

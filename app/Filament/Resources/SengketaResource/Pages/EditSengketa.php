<?php

namespace App\Filament\Resources\SengketaResource\Pages;

use App\Filament\Resources\SengketaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSengketa extends EditRecord
{
    protected static string $resource = SengketaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

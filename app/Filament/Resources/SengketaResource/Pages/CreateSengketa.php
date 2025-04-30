<?php

namespace App\Filament\Resources\SengketaResource\Pages;

use App\Filament\Resources\SengketaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSengketa extends CreateRecord
{
    protected static string $resource = SengketaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

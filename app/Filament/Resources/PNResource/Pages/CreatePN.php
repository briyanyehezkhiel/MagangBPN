<?php

namespace App\Filament\Resources\PNResource\Pages;

use App\Filament\Resources\PNResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePN extends CreateRecord
{
    protected static string $resource = PNResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

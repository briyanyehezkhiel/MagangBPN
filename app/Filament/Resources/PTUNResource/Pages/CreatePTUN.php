<?php

namespace App\Filament\Resources\PTUNResource\Pages;

use App\Filament\Resources\PTUNResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePTUN extends CreateRecord
{
    protected static string $resource = PTUNResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

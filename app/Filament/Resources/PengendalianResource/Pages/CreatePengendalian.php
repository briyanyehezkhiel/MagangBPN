<?php

namespace App\Filament\Resources\PengendalianResource\Pages;

use App\Filament\Resources\PengendalianResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePengendalian extends CreateRecord
{
    protected static string $resource = PengendalianResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

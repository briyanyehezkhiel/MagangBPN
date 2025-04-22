<?php

namespace App\Filament\Resources\PTUNResource\Pages;

use App\Filament\Resources\PTUNResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPTUNS extends ListRecords
{
    protected static string $resource = PTUNResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

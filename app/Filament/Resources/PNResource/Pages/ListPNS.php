<?php

namespace App\Filament\Resources\PNResource\Pages;

use App\Filament\Resources\PNResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPNS extends ListRecords
{
    protected static string $resource = PNResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PTUNResource\Pages;

use App\Filament\Resources\PTUNResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPTUNS extends ListRecords
{
    protected static string $resource = PTUNResource::class;

    public static ?string $title = 'Daftar PTUN';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make() ->label('Tambah PTUN'),
        ];
    }
}

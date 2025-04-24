<?php

namespace App\Filament\Resources\PengendalianResource\Pages;

use App\Filament\Resources\PengendalianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengendalians extends ListRecords
{
    protected static string $resource = PengendalianResource::class;

    public static ?string $title = 'Daftar Pengendalian';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make() ->label('Tambah Pengendalian'),
        ];
    }
}

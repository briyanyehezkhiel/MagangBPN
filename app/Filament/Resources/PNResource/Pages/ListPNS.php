<?php

namespace App\Filament\Resources\PNResource\Pages;

use App\Filament\Resources\PNResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;

class ListPNS extends ListRecords
{
    protected static string $resource = PNResource::class;

    public static ?string $title = 'Daftar Perkara PN';


    protected function getHeaderActions(): array
    {
        return [

             // Tombol download Excel <2022
             Action::make('file2022')
             ->label('<2022')
             ->url('https://docs.google.com/spreadsheets/d/1e3lj_GDUvW5YReZbcieJUp7XZ758G23JafjT_iQ3UYA/edit?gid=1959121610#gid=1959121610') // ganti dengan URL file Excel kamu
             ->color('warning')
             ->openUrlInNewTab(),
            Actions\CreateAction::make()->label('Tambah Perkara PN'),
        ];
    }
}

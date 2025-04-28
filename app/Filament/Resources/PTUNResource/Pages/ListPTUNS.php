<?php

namespace App\Filament\Resources\PTUNResource\Pages;

use App\Filament\Resources\PTUNResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;

class ListPTUNS extends ListRecords
{
    protected static string $resource = PTUNResource::class;

    public static ?string $title = 'Daftar Perkara PTUN';


    protected function getHeaderActions(): array
    {
        return [

             // Tombol download Excel <2022
             Action::make('file ptun')
             ->label('<2022')
             ->url('https://docs.google.com/spreadsheets/d/1Q-L2DzpQvFd-CTS-9oM2pG53Oh6E2dSSSlXWxzUU0Z8/edit?gid=600923734#gid=600923734') // ganti dengan URL file Excel kamu
             ->color('warning')
             ->openUrlInNewTab(),
            Actions\CreateAction::make() ->label('Tambah Perkara PTUN'),

        ];
    }
}

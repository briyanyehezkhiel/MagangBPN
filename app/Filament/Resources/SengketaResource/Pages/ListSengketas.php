<?php

namespace App\Filament\Resources\SengketaResource\Pages;

use App\Filament\Resources\SengketaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
class ListSengketas extends ListRecords
{
    protected static string $resource = SengketaResource::class;

    public static ?string $title = 'Daftar Sengketa';


    protected function getHeaderActions(): array
    {
        return [
             // Tombol download Excel <2022
             Action::make('filesengketa')
             ->label('Lainnya')
             ->url('https://docs.google.com/spreadsheets/d/1j3fcEbKZhid9rgxvtoxNrE3Kz6SlPzsmVf3CQDurLn8/edit?gid=0#gid=0') // ganti dengan URL file Excel kamu
             ->color('warning')
             ->openUrlInNewTab(),
            Actions\CreateAction::make() ->label('Tambah Sengketa'),
        ];
    }
}

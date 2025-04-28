<?php

namespace App\Filament\Resources\PengendalianResource\Pages;

use App\Filament\Resources\PengendalianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;

class ListPengendalians extends ListRecords
{
    protected static string $resource = PengendalianResource::class;

    public static ?string $title = 'Daftar Pengendalian';

    protected function getHeaderActions(): array
    {
        return [
            
            // Tombol download Excel <2022
            Action::make('<2022')
            ->label('Lainnya')
            ->url('https://docs.google.com/spreadsheets/d/14bHtERkRhppReeCoIFL_dAAN-c4WmN6TFb8UT6IRyEY/edit?gid=0#gid=0') // ganti dengan URL file Excel kamu
            ->color('warning')
            ->openUrlInNewTab(),
            Actions\CreateAction::make()->label('Tambah Pengendalian'),
        ];
    }
}

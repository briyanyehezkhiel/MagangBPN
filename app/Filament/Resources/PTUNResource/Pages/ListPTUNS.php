<?php

namespace App\Filament\Resources\PTUNResource\Pages;

use App\Filament\Resources\PTUNResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PTUNImport;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Actions\CreateAction;


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

            // Tombol untuk mengimpor data dari file Excel
             Action::make('import')
                    ->label('Import CSV')
                    ->form([
                        FileUpload::make('file')
                            ->label('File CSV')
                            ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'])
                            ->required(),
                        TextInput::make('tahun')
                            ->label('Tahun')
                            ->required(),  // Menambahkan input tahun di sini
                    ])
                    ->action(function (array $data) {
                    try {
                        $filePath = storage_path('app/public/' . $data['file']);
                        $tahun = $data['tahun'];

                        Excel::import(new PTUNImport($tahun), $filePath);

                        Notification::make()
                            ->success()
                            ->title('Berhasil')
                            ->body('Impor data berhasil.')
                            ->send();

                    } catch (\Throwable $e) {
                        Notification::make()
                            ->danger()
                            ->title('Gagal Import')
                            ->body('Data tidak sesuai.')
                            ->send();
                    }
                })

                    ->visible(condition: fn () => auth()->user()?->role === 'admin'), // hanya admin bisa lihat

            // Tombol untuk menambahkan data baru
            Actions\CreateAction::make() ->label('Tambah Perkara PTUN'),

        ];
    }
}

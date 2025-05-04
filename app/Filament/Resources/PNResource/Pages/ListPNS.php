<?php

namespace App\Filament\Resources\PNResource\Pages;

use App\Filament\Resources\PNResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PNImport;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Actions\CreateAction;
use App\Exports\PNExport;


class ListPNS extends ListRecords
{
    protected static string $resource = PNResource::class;

    public static ?string $title = 'Daftar Perkara PN';


    protected function getHeaderActions(): array
    {
        return [

             // Tombol download Excel <2022
             Action::make('file2022')
             ->label('Lainnya')
             ->url('https://docs.google.com/spreadsheets/d/1e3lj_GDUvW5YReZbcieJUp7XZ758G23JafjT_iQ3UYA/edit?gid=1959121610#gid=1959121610') // ganti dengan URL file Excel kamu
             ->color('warning')
             ->openUrlInNewTab(),

             Action::make('Export CSV')
            ->label('Export CSV')
            ->icon('heroicon-o-arrow-down-tray')
            ->action(function () {
                return response()->streamDownload(function () {
                    echo Excel::raw(new PNExport, \Maatwebsite\Excel\Excel::CSV);
                }, 'pn-export.csv');
            }),

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
                            ->length(4)
                            // ->required()  // Menambahkan input tahun di sini
                            ->numeric(),
                    ])
                    ->action(function (array $data) {
                    try {
                        $filePath = storage_path('app/public/' . $data['file']);
                        $tahun = $data['tahun'];

                        Excel::import(new PNImport($tahun), $filePath);

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
                ->icon('heroicon-o-arrow-up-tray')

                    ->visible(condition: fn () => auth()->user()?->role === 'admin'), // hanya admin bisa lihat

            // Tombol untuk menambahkan data baru
            Actions\CreateAction::make()->label('Tambah Perkara PN'),
        ];
    }
}

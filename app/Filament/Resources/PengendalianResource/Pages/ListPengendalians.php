<?php

namespace App\Filament\Resources\PengendalianResource\Pages;

use App\Filament\Resources\PengendalianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PengendalianImport;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Actions\CreateAction;
use App\Exports\PengendalianExport;


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

            // Tombol untuk mengekspor data ke file CSV
            Action::make('Export CSV')
                ->label('Export CSV')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    $fileName = 'Pengendalian-export-' . now()->format('Y-m-d') . '.csv';

                    return response()->streamDownload(function () {
                        echo Excel::raw(new PengendalianExport, \Maatwebsite\Excel\Excel::CSV);
                    }, $fileName);
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

                        Excel::import(new PengendalianImport($tahun), $filePath);

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
            Actions\CreateAction::make()->label('Tambah Pengendalian'),
        ];
    }
}

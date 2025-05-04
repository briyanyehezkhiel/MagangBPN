<?php

namespace App\Filament\Resources\SengketaResource\Pages;

use App\Filament\Resources\SengketaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SengketaImport;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Actions\CreateAction;

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
                            ->numeric()
                            ->required(),  // Menambahkan input tahun di sini
                    ])
                    ->action(function (array $data) {
                    try {
                        $filePath = storage_path('app/public/' . $data['file']);
                        $tahun = $data['tahun'];

                        Excel::import(new SengketaImport($tahun), $filePath);

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
            Actions\CreateAction::make() ->label('Tambah Sengketa'),
        ];
    }
}

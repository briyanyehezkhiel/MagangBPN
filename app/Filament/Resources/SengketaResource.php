<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SengketaResource\Pages;
use App\Models\Sengketa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\FileUpload;
use App\Imports\SengketaImport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;


class SengketaResource extends Resource
{
    protected static ?string $model = Sengketa::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    // Mengubah label di navigasi menjadi singular
    public static function getNavigationLabel(): string
    {
        return 'Sengketa'; // Label navigasi menjadi singular
    }

    // Mengubah label resource menjadi singular
    public static function getLabel(): string
    {
        return 'Sengketa'; // Label resource menjadi singular
    }

    public static function getPluralLabel(): string
    {
        return 'Sengketa'; // Bukan Sengketas
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->role === 'admin';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tahun'),
                TextInput::make('pemohon'),
                TextInput::make('termohon'),
                TextInput::make('objek'),
                TextInput::make('pokok_masalah'),
                TextInput::make('progress_penyelesaian'),
                TextInput::make('konseptor'),
                TextInput::make('k1'),
                TextInput::make('k2'),
                TextInput::make('k3'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')
                    ->sortable()
                    ->searchable(), // Enable search for 'tahun'

                TextColumn::make('pemohon')
                    ->sortable()
                    ->searchable() // Enable search for 'pemohon'
                    ->extraAttributes(['style' => 'width: 300px; word-wrap: break-word; white-space: normal;']),


                TextColumn::make('termohon')
                    ->sortable()
                    ->searchable() // Enable search for 'termohon'
                    ->extraAttributes(['style' => 'width: 300px; word-wrap: break-word; white-space: normal;']),


                TextColumn::make('objek')
                    ->sortable()
                    ->searchable() // Enable search for 'objek'
                    ->extraAttributes(['style' => 'width: 300px; word-wrap: break-word; white-space: normal;']),


                TextColumn::make('pokok_masalah')
                    ->sortable()
                    ->searchable() // Enable search for 'pokok_masalah'
                    ->extraAttributes(['style' => 'width: 700px; word-wrap: break-word; white-space: normal;']),


                TextColumn::make('progress_penyelesaian')
                    ->sortable()
                    ->searchable() // Enable search for 'progress_penyelesaian'
                    ->extraAttributes(['style' => 'width: 300px; word-wrap: break-word; white-space: normal;']),


                TextColumn::make('konseptor')
                    ->sortable()
                    ->searchable(), // Enable search for 'konseptor'

                TextColumn::make('k1')
                    ->sortable()
                    ->searchable(), // Enable search for 'k1'

                TextColumn::make('k2')
                    ->sortable()
                    ->searchable(), // Enable search for 'k2'

                TextColumn::make('k3')
                    ->sortable()
                    ->searchable(), // Enable search for 'k3'
            ])
            ->headerActions([
                Action::make('import')
                    ->label('Import Excel')
                    ->form([
                        FileUpload::make('file')
                            ->label('File Excel')
                            ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'])
                            ->required(),
                        TextInput::make('tahun')
                            ->label('Tahun')
                            ->required(),  // Menambahkan input tahun di sini
                    ])
                    ->action(function (array $data) {
                        $tahun = $data['tahun'];
                        Excel::import(new SengketaImport($tahun), storage_path('app/public/' . $data['file']));

                        Notification::make()
                        ->success()  // Specify the type of notification
                        ->title('Success!')  // Title of the notification
                        ->body('Impor data berhasil.')  // Message body of the notification
                        ->send();  // Actually send the notification
                    })
                    ->visible(condition: fn () => auth()->user()?->role === 'admin'), // hanya admin bisa lihat

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                ->visible(fn () => auth()->user()?->role === 'admin'), // hanya admin bisa lihat

            ])
            ->searchable(); // Enable global search functionality across all searchable columns
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSengketas::route('/'),
            'create' => Pages\CreateSengketa::route('/create'),
            'edit' => Pages\EditSengketa::route('/{record}/edit'),
        ];
    }
}

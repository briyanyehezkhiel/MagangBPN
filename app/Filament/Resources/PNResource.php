<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PNResource\Pages;
use App\Filament\Resources\PNResource\RelationManagers;
use App\Models\PN;
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
use App\Imports\PNImport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;


class PNResource extends Resource
{
    protected static ?string $model = PN::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';


    // Mengubah label di navigasi menjadi singular
    public static function getNavigationLabel(): string
    {
        return 'Perkara PN '; // Label navigasi menjadi singular
    }

    // Mengubah label resource menjadi singular
    public static function getLabel(): string
    {
        return 'Perkara PN '; // Label resource menjadi singular
    }

    public static function getPluralLabel(): string
    {
        return 'Perkara PN '; // Bukan Perkara PN s
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
                TextInput::make('no_register_perkara'),
                TextInput::make('penggugat'),
                TextInput::make('tergugat'),
                TextInput::make('objek_perkara'),
                TextInput::make('tk1'),
                TextInput::make('banding'),
                TextInput::make('kasasi'),
                TextInput::make('pk'),
                TextInput::make('tipologi_kasus'),
                TextInput::make('menang'),
                TextInput::make('kalah'),
                TextInput::make('keterangan'),
                TextInput::make('justicia'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),


                TextColumn::make('no_register_perkara')
                    ->label('No. Register Perkara')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('penggugat')
                    ->label('Penggugat')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['style' => 'width: 300px; word-wrap: break-word; white-space: normal;']),

                TextColumn::make('tergugat')
                    ->label('Tergugat')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['style' => 'width: 700px; word-wrap: break-word; white-space: normal;']),

                TextColumn::make('objek_perkara')
                    ->label('Objek Perkara')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['style' => 'width: 300px; word-wrap: break-word; white-space: normal;']),


                TextColumn::make('tk1')
                    ->label('TK1')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('banding')
                    ->label('Banding')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kasasi')
                    ->label('Kasasi')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('pk')
                    ->label('PK')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('tipologi_kasus')
                    ->label('Tipologi Kasus')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('menang')
                    ->label('Menang')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kalah')
                    ->label('Kalah')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->sortable()
                    ->wrap(),

                TextColumn::make('justicia')
                    ->label('Justicia')
                    ->sortable()
                    ->searchable(),
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
                        Excel::import(new PNImport($tahun), storage_path('app/public/' . $data['file']));

                        Notification::make()
                        ->success()  // Specify the type of notification
                        ->title('Success!')  // Title of the notification
                        ->body('Impor data berhasil.')  // Message body of the notification
                        ->send();  // Actually send the notification
                    })
                    ->visible(condition: fn () => auth()->user()?->role === 'admin'), // hanya admin bisa lihat

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                ->visible(fn () => auth()->user()?->role === 'admin'), // hanya admin bisa lihat

            ])
            ->filters([
                //
            ])
            // Enable search functionality by using the `searchable` method.
            ->searchable(); // This enables the global search bar for all the searchable columns
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
            'index' => Pages\ListPNS::route('/'),
            'create' => Pages\CreatePN::route('/create'),
            'edit' => Pages\EditPN::route('/{record}/edit'),
        ];
    }
}

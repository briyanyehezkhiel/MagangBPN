<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengendalianResource\Pages;
use App\Models\Pengendalian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PengendalianImport;
use Filament\Notifications\Notification;

class PengendalianResource extends Resource
{
    protected static ?string $model = Pengendalian::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    // Mengubah label di navigasi menjadi singular
    public static function getNavigationLabel(): string
    {
        return 'Pengendalian'; // Label navigasi menjadi singular
    }

    // Mengubah label resource menjadi singular
    public static function getLabel(): string
    {
        return 'Pengendalian'; // Label resource menjadi singular
    }

    public static function getPluralLabel(): string
    {
        return 'Pengendalian'; // Bukan Pengendalians
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
                TextInput::make('tahun')
                    ->required()
                    ->Length(4)
                    ->numeric(),

                Select::make('jenis_hak')
                    ->options([
                        'Hak Milik' => 'Hak Milik',
                        'Hak Guna Usaha' => 'Hak Guna Usaha',
                        'Hak Pakai' => 'Hak Pakai',
                        'Hak Guna Bangunan' => 'Hak Guna Bangunan',
                    ])
                    ->searchable(),

                TextInput::make('nomor')
                    ->numeric(),

                DatePicker::make('tanggal_terbit')
                    ->after(fn($get) => $get('tanggal_berakhir') && $get('tanggal_terbit') >= $get('tanggal_berakhir') ? 'Tanggal Terbit harus lebih kecil dari Tanggal Berakhir' : null), // Validasi tanggal_terbit sebelum tanggal_berakhir

                DatePicker::make('tanggal_berakhir')
                    ->before(fn($get) => $get('tanggal_terbit') && $get('tanggal_berakhir') <= $get('tanggal_terbit') ? 'Tanggal Berakhir harus lebih besar dari Tanggal Terbit' : null), // Validasi tanggal_berakhir setelah tanggal_terbit


                TextInput::make('kota'),

                TextInput::make('kecamatan'),

                TextInput::make('kelurahan'),

                TextInput::make('luas_hak')
                    ->suffix(' m²')
                    ->numeric(),

                TextInput::make('penguasaan_tanah'),

                TextInput::make('penggunaan_tanah'),

                TextInput::make('pemanfaatan_tanah'),

                TextInput::make('terindikasi_terlantar')
                    ->numeric()
                    ->suffix('m²'),

                Textarea::make('keterangan')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Pengendalian::query()->latest()) // Ini menambahkan orderBy('created_at', 'desc')

            ->columns([
                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('jenis_hak')
                    ->label('Jenis Hak')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nomor')
                    ->label('Nomor')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('tanggal_terbit')
                    ->label('Tanggal Terbit')
                    ->date()
                    ->sortable(),

                TextColumn::make('tanggal_berakhir')
                    ->label('Tanggal Berakhir')
                    ->date()
                    ->sortable(),

                TextColumn::make('kota')
                    ->label('Kota')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kecamatan')
                    ->label('Kecamatan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kelurahan')
                    ->label('Kelurahan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('luas_hak')
                    ->label('Luas Hak')
                    ->suffix(' m²')
                    ->sortable(),

                TextColumn::make('penguasaan_tanah')
                    ->label('Penguasaan Tanah')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('penggunaan_tanah')
                    ->label('Penggunaan Tanah')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('pemanfaatan_tanah')
                    ->label('Pemanfaatan Tanah')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('terindikasi_terlantar')
                    ->label('Terindikasi Terlantar')
                    ->suffix('m²')
                    ->sortable(),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->sortable()
                    ->extraAttributes(['style' => 'width: 300px; word-wrap: break-word; white-space: normal;']),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                ->visible(fn () => auth()->user()?->role === 'admin'), // hanya admin bisa lihat
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengendalians::route('/'),
            'create' => Pages\CreatePengendalian::route('/create'),
            'edit' => Pages\EditPengendalian::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PTUNResource\Pages;
use App\Models\PTUN;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Facades\Filament;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\Action;
use App\Imports\PTUNImport;
use Filament\Notifications\Notification;



class PTUNResource extends Resource
{
    protected static ?string $model = PTUN::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    // Mengubah label di navigasi menjadi singular
    public static function getNavigationLabel(): string
    {
        return 'Perkara PTUN'; // Label navigasi menjadi singular
    }

    // Mengubah label resource menjadi singular
    public static function getLabel(): string
    {
        return 'Perkara PTUN'; // Label resource menjadi singular
    }

    public static function getPluralLabel(): string
    {
        return 'Perkara PTUN'; // Bukan Perkara PTUNS
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
                TextInput::make('lokus_dan_register_perkara')->label('Lokus dan Register Perkara'),
                TextInput::make('penggugat'),
                TextInput::make('tergugat'),
                TextInput::make('objek_perkara_letak')->label('Objek Perkara/Letak Objek'),
                TextInput::make('tk1'),
                TextInput::make('banding'),
                TextInput::make('kasasi'),
                TextInput::make('pk'),
                TextInput::make('amar_putusan_akhir')->label('Amar Putusan Terakhir'),
                TextInput::make('keterangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(PTUN::query()->latest()) // Ini menambahkan orderBy('created_at', 'desc')

            ->columns([
                TextColumn::make('tahun')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('lokus_dan_register_perkara')
                    ->label('Lokus dan Register Perkara')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('penggugat')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('tergugat')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('objek_perkara_letak')
                    ->label('Objek Perkara/Letak Objek')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['style' => 'width: 300px; word-wrap: break-word; white-space: normal;']),


                TextColumn::make('tk1')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('banding')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kasasi')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('pk')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('amar_putusan_akhir')
                    ->label('Amar Putusan Terakhir')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['style' => 'width: 700px; word-wrap: break-word; white-space: normal;']),

                TextColumn::make('keterangan')
                    ->sortable()
                    ->searchable(),
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
            ->searchable(); // Enable search functionality across all searchable columns
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
            'index' => Pages\ListPTUNS::route('/'),
            'create' => Pages\CreatePTUN::route('/create'),
            'edit' => Pages\EditPTUN::route('/{record}/edit'),
        ];
    }
}

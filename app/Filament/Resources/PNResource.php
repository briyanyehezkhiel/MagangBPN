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
                    ->searchable(),

                TextColumn::make('tergugat')
                    ->label('Tergugat')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('objek_perkara')
                    ->label('Objek Perkara')
                    ->sortable()
                    ->searchable(),

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
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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

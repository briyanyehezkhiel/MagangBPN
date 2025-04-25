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

class SengketaResource extends Resource
{
    protected static ?string $model = Sengketa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                    ->searchable(), // Enable search for 'pemohon'

                TextColumn::make('termohon')
                    ->sortable()
                    ->searchable(), // Enable search for 'termohon'

                TextColumn::make('objek')
                    ->sortable()
                    ->searchable(), // Enable search for 'objek'

                TextColumn::make('pokok_masalah')
                    ->sortable()
                    ->searchable(), // Enable search for 'pokok_masalah'

                TextColumn::make('progress_penyelesaian')
                    ->sortable()
                    ->searchable(), // Enable search for 'progress_penyelesaian'

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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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

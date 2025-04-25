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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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
                TextColumn::make('tahun'),
                TextColumn::make('no_register_perkara'),
                TextColumn::make('penggugat'),
                TextColumn::make('tergugat'),
                TextColumn::make('objek_perkara'),
                TextColumn::make('tk1'),
                TextColumn::make('banding'),
                TextColumn::make('kasasi'),
                TextColumn::make('pk'),
                TextColumn::make('tipologi_kasus'),
                TextColumn::make('menang'),
                TextColumn::make('kalah'),
                TextColumn::make('keterangan'),
                TextColumn::make('justicia'),
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
            ]);
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

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SengketaResource\Pages;
use App\Filament\Resources\SengketaResource\RelationManagers;
use App\Models\Sengketa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class SengketaResource extends Resource
{
    protected static ?string $model = Sengketa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                TextColumn::make('tahun'),
                TextColumn::make('pemohon'),
                TextColumn::make('termohon'),
                TextColumn::make('objek'),
                TextColumn::make('pokok_masalah'),
                TextColumn::make('progress_penyelesaian'),
                TextColumn::make('konseptor'),
                TextColumn::make('k1'),
                TextColumn::make('k2'),
                TextColumn::make('k3'),
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
            'index' => Pages\ListSengketas::route('/'),
            'create' => Pages\CreateSengketa::route('/create'),
            'edit' => Pages\EditSengketa::route('/{record}/edit'),
        ];
    }
}

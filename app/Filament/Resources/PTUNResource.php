<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PTUNResource\Pages;
use App\Filament\Resources\PTUNResource\RelationManagers;
use App\Models\PTUN;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class PTUNResource extends Resource
{
    protected static ?string $model = PTUN::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tahun'),
                TextInput::make('likus_dan_register_perkara')->label('Likus dan Register Perkara'),
                TextInput::make('penggugat'),
                TextInput::make('tergugat'),
                TextInput::make('objek_perkara_letak')->label('Objek Perkara/Letak Objek'),
                TextInput::make('tk1'),
                TextInput::make('banding'),
                TextInput::make('kasasi'),
                TextInput::make('pk'),
                TextInput::make('amar_putusan_akhir')->label('Amar Putusan Akhir'),
                TextInput::make('keterangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun'),
                TextColumn::make('likus_dan_register_perkara')->label('Likus dan Register Perkara'),
                TextColumn::make('penggugat'),
                TextColumn::make('tergugat'),
                TextColumn::make('objek_perkara_letak')->label('Objek Perkara/Letak Objek'),
                TextColumn::make('tk1'),
                TextColumn::make('banding'),
                TextColumn::make('kasasi'),
                TextColumn::make('pk'),
                TextColumn::make('amar_putusan_akhir')->label('Amar Putusan Akhir'),
                TextColumn::make('keterangan'),
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
            'index' => Pages\ListPTUNS::route('/'),
            'create' => Pages\CreatePTUN::route('/create'),
            'edit' => Pages\EditPTUN::route('/{record}/edit'),
        ];
    }
}

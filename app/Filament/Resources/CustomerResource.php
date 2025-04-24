<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    // Mengubah label di navigasi menjadi singular
    public static function getNavigationLabel(): string
    {
        return 'Customer'; // Label navigasi menjadi singular
    }

    // Mengubah label resource menjadi singular
    public static function getLabel(): string
    {
        return 'Customer'; // Label resource menjadi singular
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Customer Name'),
                TextInput::make('number')->label('Phone Number'),
                TextInput::make('address')->label('Address'),
                TextInput::make('gender')->label('Gender'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Customer Name'),
                TextColumn::make('number')->label('Phone Number'),
                TextColumn::make('address')->label('Address'),
                TextColumn::make('gender')->label('Gender'),
            ])
            ->filters([
                // Tambahkan filter sesuai kebutuhan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            // Jika ada relasi, definisikan di sini
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}

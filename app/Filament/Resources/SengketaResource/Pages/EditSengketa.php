<?php

namespace App\Filament\Resources\SengketaResource\Pages;

use App\Filament\Resources\SengketaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;


class EditSengketa extends EditRecord
{
    protected static string $resource = SengketaResource::class;

    public function mount(string|int $record): void
{
    parent::mount($record);

        if (Auth::check() && Auth::user()->role !== 'admin') {
            $this->redirect('admin/sengketas'); // tanpa return
        }
    }
    protected function afterSave(): void
    {
        $this->redirect($this->getRedirectUrl());
    }

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke index setelah edit
    }
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

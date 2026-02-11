<?php

namespace App\Filament\Resources\NewsUpdateResource\Pages;

use App\Filament\Resources\NewsUpdateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditNewsUpdate extends EditRecord
{
    protected static string $resource = NewsUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

     protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('view', [
            'record' => $this->record,
        ]);
    }

    protected function afterSave(): void
    {
        Notification::make()
            ->title('News update updated')
            ->body('Changes have been saved successfully.')
            ->success()
            ->send();
    }
}

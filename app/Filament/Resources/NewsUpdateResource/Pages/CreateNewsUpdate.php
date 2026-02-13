<?php

namespace App\Filament\Resources\NewsUpdateResource\Pages;

use App\Filament\Resources\NewsUpdateResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateNewsUpdate extends CreateRecord
{
    protected static string $resource = NewsUpdateResource::class;

    /**
     * Redirect to the View page after creation
     */
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('view', [
            'record' => $this->record,
        ]);
    }

    /**
     * Show a success notification
     */
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('News update created successfully')
            ->success();
    }
}

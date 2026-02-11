<?php

namespace App\Filament\Resources\NewsUpdateResource\Pages;

use App\Filament\Resources\NewsUpdateResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewNewsUpdate extends ViewRecord
{
    protected static string $resource = NewsUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

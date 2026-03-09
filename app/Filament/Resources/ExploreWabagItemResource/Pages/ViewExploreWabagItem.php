<?php

namespace App\Filament\Resources\ExploreWabagItemResource\Pages;

use App\Filament\Resources\ExploreWabagItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewExploreWabagItem extends ViewRecord
{
    protected static string $resource = ExploreWabagItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

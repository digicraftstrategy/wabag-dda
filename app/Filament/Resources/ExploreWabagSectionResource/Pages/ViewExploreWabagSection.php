<?php

namespace App\Filament\Resources\ExploreWabagSectionResource\Pages;

use App\Filament\Resources\ExploreWabagSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewExploreWabagSection extends ViewRecord
{
    protected static string $resource = ExploreWabagSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

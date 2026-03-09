<?php

namespace App\Filament\Resources\ExploreWabagSectionResource\Pages;

use App\Filament\Resources\ExploreWabagSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExploreWabagSections extends ListRecords
{
    protected static string $resource = ExploreWabagSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

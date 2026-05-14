<?php

namespace App\Filament\Resources\ExploreWabagItemResource\Pages;

use App\Filament\Resources\ExploreWabagItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExploreWabagItems extends ListRecords
{
    protected static string $resource = ExploreWabagItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

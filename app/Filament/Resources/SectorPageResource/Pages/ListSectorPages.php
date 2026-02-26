<?php

namespace App\Filament\Resources\SectorPageResource\Pages;

use App\Filament\Resources\SectorPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSectorPages extends ListRecords
{
    protected static string $resource = SectorPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

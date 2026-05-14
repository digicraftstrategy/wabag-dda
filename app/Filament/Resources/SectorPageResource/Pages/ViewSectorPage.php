<?php

namespace App\Filament\Resources\SectorPageResource\Pages;

use App\Filament\Resources\SectorPageResource;
use Filament\Resources\Pages\ViewRecord;

class ViewSectorPage extends ViewRecord
{
    protected static string $resource = SectorPageResource::class;
    protected static string $view = 'filament.resources.sector-page-resource.pages.view-sector-page';

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\EditAction::make(),
        ];
    }
}


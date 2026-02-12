<?php

namespace App\Filament\Resources\SectorPageResource\Pages;

use App\Filament\Resources\SectorPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSectorPage extends EditRecord
{
    protected static string $resource = SectorPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

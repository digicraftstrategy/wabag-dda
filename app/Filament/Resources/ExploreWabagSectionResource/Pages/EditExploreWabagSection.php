<?php

namespace App\Filament\Resources\ExploreWabagSectionResource\Pages;

use App\Filament\Resources\ExploreWabagSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExploreWabagSection extends EditRecord
{
    protected static string $resource = ExploreWabagSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

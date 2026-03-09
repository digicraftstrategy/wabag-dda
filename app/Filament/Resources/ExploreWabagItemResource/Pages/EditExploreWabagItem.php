<?php

namespace App\Filament\Resources\ExploreWabagItemResource\Pages;

use App\Filament\Resources\ExploreWabagItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExploreWabagItem extends EditRecord
{
    protected static string $resource = ExploreWabagItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

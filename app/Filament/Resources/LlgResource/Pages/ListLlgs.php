<?php

namespace App\Filament\Resources\LlgResource\Pages;

use App\Filament\Resources\LlgResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLlgs extends ListRecords
{
    protected static string $resource = LlgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

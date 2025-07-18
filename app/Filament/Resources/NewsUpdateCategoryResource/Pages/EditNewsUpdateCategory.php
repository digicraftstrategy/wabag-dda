<?php

namespace App\Filament\Resources\NewsUpdateCategoryResource\Pages;

use App\Filament\Resources\NewsUpdateCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsUpdateCategory extends EditRecord
{
    protected static string $resource = NewsUpdateCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use App\Filament\Resources\ProjectResource\RelationManagers;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjectUpdate extends CreateRecord
{
    protected static string $resource = ProjectUpdatesRelationManager::class;
}

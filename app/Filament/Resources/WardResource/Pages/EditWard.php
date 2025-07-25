<?php

namespace App\Filament\Resources\WardResource\Pages;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Filament\Resources\WardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWard extends EditRecord
{
    protected static string $resource = WardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->visible(function () {
                /** @var User|null $user */
                $user = Auth::user();
                return $user && $user->can('delete wards');
            }),
        ];
    }
}

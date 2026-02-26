<?php

namespace App\Filament\Resources\WardResource\Pages;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Filament\Actions;
use App\Filament\Resources\WardResource;
use Filament\Resources\Pages\ViewRecord;

class ViewWard extends ViewRecord
{
    protected static string $resource = WardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
            ->visible(function () {
                /** @var User|null $user */
                $user = Auth::user();
                return $user && $user->can('edit wards');
            }),

            Actions\ViewAction::make()
            ->visible(function () {
                /** @var User|null $user */
                $user = Auth::user();
                return $user && $user->can('view wards');
            }),
        ];
    }
}
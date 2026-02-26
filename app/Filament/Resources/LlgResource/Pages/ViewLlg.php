<?php

namespace App\Filament\Resources\LlgResource\Pages;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Filament\Actions;
use App\Filament\Resources\LlgResource;
use Filament\Resources\Pages\ViewRecord;

class ViewLlg extends ViewRecord
{
    protected static string $resource = LlgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
            ->visible(function () {
                /** @var User|null $user */
                $user = Auth::user();
                return $user && $user->can('edit llgs');
            }),

            Actions\ViewAction::make()
            ->visible(function () {
                /** @var User|null $user */
                $user = Auth::user();
                return $user && $user->can('view llgs');
            }),
        ];
    }
}
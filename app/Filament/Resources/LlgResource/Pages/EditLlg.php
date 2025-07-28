<?php

namespace App\Filament\Resources\LlgResource\Pages;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Filament\Resources\LlgResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLlg extends EditRecord
{
    protected static string $resource = LlgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->visible(function () {
                /** @var User|null $user */
                $user = Auth::user();
                return $user && $user->can('delete llgs');
            }),
        ];
    }
}

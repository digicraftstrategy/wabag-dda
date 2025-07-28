<?php

namespace App\Filament\Resources\LlgResource\Pages;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Filament\Resources\LlgResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLlgs extends ListRecords
{
    protected static string $resource = LlgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->visible(function () {
                /** @var User|null $user */
                $user = Auth::user();
                return $user && $user->can('create llgs');
            }),
            //Actions\ViewAction::make()
        ];
    }

    /**
     * Disable row click if user lacks edit permission.
     */
    public function getTableRecordUrlUsing(): ?\Closure
    {
        return function ($record) {
            /** @var \App\Models\User|null $user */
            $user = Auth::user();

            if ($user?->can('edit llgs')) {
                return LlgResource::getUrl('view', ['record' => $record]);
            }

            if ($user?->can('view llgs')) {
                return LlgResource::getUrl('view', ['record' => $record]);
            }

            return null; // disables row click if no view/edit permission
        };  
    }
}

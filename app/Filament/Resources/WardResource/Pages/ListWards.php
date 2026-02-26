<?php

namespace App\Filament\Resources\WardResource\Pages;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Filament\Resources\WardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWards extends ListRecords
{
    protected static string $resource = WardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->visible(function () {
                /** @var User|null $user */
                $user = Auth::user();
                return $user && $user->can('create wards');
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

            if ($user?->can('edit wards')) {
                return WardResource::getUrl('view', ['record' => $record]);
            }

            if ($user?->can('view wards')) {
                return WardResource::getUrl('view', ['record' => $record]);
            }

            return null; // disables row click if no view/edit permission
        };  
    }
}

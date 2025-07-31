<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Filament\Widgets\{ProjectKpiOverview, ProjectTimelineChart, RecentNewsUpdates, ProjectStatusPieChart};

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.project-tracker-dashboard';

    public static function shouldRegisterNavigation(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();
        //return auth()->user()?->hasRole('admin') || auth()->user()?->can('view dashboard'); 
        return $user && $user->hasRole('admin') || $user && $user->can('view dashboard');
    }
    protected function getHeaderWidgets(): array
    {
        return [
                ProjectKpiOverview::class,
                ProjectTimelineChart::class,
                ProjectStatusPieChart::class,
                RecentNewsUpdates::class,
        ];
    }
}

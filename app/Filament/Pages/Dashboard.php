<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Filament\Widgets\{
    ProjectKpiOverview,
    ProjectTimelineChart,
    RecentNewsUpdates,
    ProjectStatusPieChart
};

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.project-tracker-dashboard';
    //protected static ?string $title = 'Project Tracker Dashboard';

    /*public static function getSlug(): string
    {
        return 'custom-dashboard'; // Unique route slug
    }*/

    public static function shouldRegisterNavigation(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();
        return $user && ($user->hasRole('admin') || $user->can('view dashboard'));
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

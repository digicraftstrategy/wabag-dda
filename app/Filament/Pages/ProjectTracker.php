<?php

namespace App\Filament\Pages;
use Illuminate\Support\Facades\Auth;
use App\Filament\Widgets\{ProjectKpiOverview, 
    ProjectTimelineChart, ProjectTrackerStats, 
    RecentNewsUpdates, ProjectStatusPieChart, 
    ProjectTypeChart, FundingSourceChart,
    ProjectProgressLineChart, ProjectProgressGraph};

use Filament\Pages\Page;

class ProjectTracker extends Page
{
    public static function shouldRegisterNavigation(): bool
    {
        return false; // completely hides from sidebar
    }

    protected static ?string $title = 'Project Tracker';

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static string $view = 'filament.pages.project-tracker';

    public static function canAccess(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();
        //return auth()->user()?->hasRole('admin') || auth()->user()?->can('view dashboard');
        return $user && $user->hasRole('admin') || $user && $user->can('view project tracker');
    }

    // In your ProjectTracker class
    protected function getHeaderWidgets(): array
    {
        return [

                ProjectTrackerStats::class,
                ProjectProgressLineChart::class,
                ProjectStatusPieChart::class,
                ProjectTimelineChart::class,
                //ProjectColunmGraph::class,
                //RecentNewsUpdates::class,
                ProjectTypeChart::class,
                FundingSourceChart::class,
                ProjectProgressGraph::class,

        ];
    }
}

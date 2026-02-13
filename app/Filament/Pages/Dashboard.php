<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Filament\Widgets\{
    ProjectKpiOverview,
    ProjectTrackerStats,
    ProjectTimelineChart,
    ProjectProgressGraph,
    RecentNewsUpdates,
    ProjectStatusPieChart,
    ProjectProgressLineChart,
    ProjectTypeChart,
    FundingSourceChart,
    ProjectByLlgChart,
    ProjectBudgetByWardChart,
    ProjectStartYearChart,
    ProjectCompletionComparisonChart,
    ProjectByFundingSourceChart,
    AverageBudgetByProjectTypeChart,
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
        return $user && ($user->hasRole(['admin', 'project-officer', 'media-officer']) || $user->can('view dashboard'));
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ProjectTrackerStats::class,
            //ProjectKpiOverview::class,
            ProjectProgressLineChart::class,
            ProjectProgressGraph::class,
            ProjectTimelineChart::class,
            ProjectTypeChart::class,
            FundingSourceChart::class,
            ProjectStatusPieChart::class,
            /////////////////////////////
            ProjectByLlgChart::class,
            ProjectStartYearChart::class,
            //ProjectBudgetByWardChart::class,
            ProjectCompletionComparisonChart::class,
            ProjectByFundingSourceChart::class,
            AverageBudgetByProjectTypeChart::class,
            RecentNewsUpdates::class,
        ];
    }
}

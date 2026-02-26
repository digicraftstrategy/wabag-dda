<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectKpiOverview extends BaseWidget
{
    protected static ?int $sort = 1; // Optional: widget position in dashboard

    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', Project::count())
                ->description('All projects entered')
                ->icon('heroicon-o-folder')
                ->color('primary'),

            Stat::make('In Progress', Project::where('status', 'in_progress')->count())
                ->description('Currently being implemented')
                ->icon('heroicon-o-arrow-path')
                ->color('warning'),

            Stat::make('Completed Projects', Project::where('status', 'completed')->count())
                ->description('Fully delivered')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}


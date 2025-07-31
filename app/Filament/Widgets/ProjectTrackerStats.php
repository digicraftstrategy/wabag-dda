<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectTrackerStats extends BaseWidget
{
    protected static ?int $sort = 1; // Optional: widget position in dashboard

    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', Project::count())
                ->description('All projects entered')
                ->icon('heroicon-o-folder')
                ->color('info'),

            Stat::make('Planned', Project::where('status', 'planned')->count())
                ->description('Currently planned')
                ->icon('heroicon-o-clock')
                ->color('info'),

            Stat::make('Approved', Project::where('status', 'approved')->count())
                ->description('Reached Approval')
                ->icon('heroicon-o-check-circle')
                ->color('success'),

                
            Stat::make('In Progress', Project::where('status', 'in_progress')->count())
                ->description('Under Progress')
                ->icon('heroicon-o-check-circle')
                ->color('warning'),

                
            Stat::make('Completed Projects', Project::where('status', 'completed')->count())
                ->description('Fully delivered')
                ->icon('heroicon-o-check-circle')
                ->color('success'),

                
            Stat::make('Delayed Projects', Project::where('status', 'delayed')->count())
                ->description('On Delay')
                ->icon('heroicon-o-check-circle')
                ->color('warning'),

                
            Stat::make('Project Cancelled', Project::where('status', 'cancelled')->count())
                ->description('Cancelled Projects')
                ->icon('heroicon-o-check-circle')
                ->color('danger'),
        ];
    }
}


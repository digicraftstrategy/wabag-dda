<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class ProjectTimelineChart extends ChartWidget
{
    protected static ?string $heading = 'Project Timeline Progress';
    protected static ?int $sort = 2;

    protected function getType(): string
    {
        return 'line'; // You can change to 'bar' or 'area' based on style
    }

    protected function getData(): array
    {
        // Example: Group projects by month of start_date
        $projects = Project::selectRaw('DATE_FORMAT(start_date, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = $projects->pluck('month')->toArray();
        $data = $projects->pluck('total')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Projects Started',
                    'data' => $data,
                    'backgroundColor' => 'rgba(59,130,246,0.5)',
                    'borderColor' => 'rgba(59,130,246,1)',
                    'fill' => true,
                ],
            ],
        ];
    }
}

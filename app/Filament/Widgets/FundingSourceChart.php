<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class FundingSourceChart extends ChartWidget
{
    protected static ?string $heading = 'Funding Source Distribution';

    protected static ?int $sort = 4;
    protected static ?string $maxHeight = '250px';
    protected function getData(): array
    {
        $projects = Project::selectRaw('funding_source_id, COUNT(*) as total')
            ->groupBy('funding_source_id')
            ->with('fundingSource')
            ->get();

        $labels = [];
        $data = [];

        foreach ($projects as $project) {
            $labels[] = $project->fundingSource?->funding_source ?? 'Unknown';
            $data[] = $project->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Projects by Funding Source',
                    'data' => $data,
                    'backgroundColor' => [
                        '#3B82F6', // blue
                        '#10B981', // green
                        '#F59E0B', // amber
                        '#EF4444', // red
                        '#6366F1', // indigo
                        '#EC4899', // pink
                        '#8B5CF6', // violet
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

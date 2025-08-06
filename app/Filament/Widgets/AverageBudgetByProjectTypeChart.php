<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Project;

class AverageBudgetByProjectTypeChart extends ChartWidget
{
    protected static ?string $heading = 'Average Budget by Project Type';

    protected function getData(): array
    {
        $data = Project::with('type')
            ->get()
            ->groupBy('project_type_id')
            ->map(function ($projects, $typeId) {
                return [
                    'type' => optional($projects->first()->type)->type ?? 'Unknown',
                    'average_budget' => $projects->avg('budget'),
                ];
            })
            ->values();

        return [
            'datasets' => [
                [
                    'label' => 'Average Budget (PGK)',
                    'data' => $data->pluck('average_budget'),
                    'backgroundColor' => [], // Optional: add colors
                ],
            ],
            'labels' => $data->pluck('type'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

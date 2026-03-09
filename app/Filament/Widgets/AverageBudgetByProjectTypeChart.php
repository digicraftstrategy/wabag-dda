<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Project;

class AverageBudgetByProjectTypeChart extends ChartWidget
{
    protected static ?string $heading = 'Average Budget by Project Type';

    protected static ?string $maxHeight = '250px';
    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }
    protected function getData(): array
    {
        $data = Project::with('type')
            ->get()
            ->groupBy('project_type_id')
            ->map(function ($projects, $typeId) {
                return [
                    'type' => optional($projects->first()->type)->type ?? 'Unknown',
                    'status' => 'status',
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
                ]
            ],
            'labels' => $data->pluck('type'),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                    'labels' => [
                        'boxWidth' => 10,
                        'font' => [
                            'size' => 11,
                        ],
                    ],
                ],
            ],
            'scales' => [
                'x' => [
                    'grid' => [
                        'color' => 'rgba(148, 163, 184, 0.2)',
                    ],
                    'ticks' => [
                        'font' => [
                            'size' => 11,
                        ],
                        'autoSkip' => true,
                        'maxRotation' => 0,
                        'minRotation' => 0,
                    ],
                ],
                'y' => [
                    'grid' => [
                        'color' => 'rgba(148, 163, 184, 0.2)',
                    ],
                    'ticks' => [
                        'font' => [
                            'size' => 11,
                        ],
                    ],
                ],
            ],
        ];
    }
}

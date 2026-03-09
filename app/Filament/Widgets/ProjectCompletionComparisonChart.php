<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ProjectCompletionComparisonChart extends ChartWidget
{
    protected static ?string $heading = 'Expected vs Actual Completion (Projects)';

    protected static ?int $sort = 10;

    protected static ?string $maxHeight = '250px';

    public function getColumnSpan(): int|string|array
    {
     return 'full';   
    }

    protected function getData(): array
    {
        $projects = \App\Models\Project::whereNotNull('actual_end_date')
            ->whereNotNull('expected_end_date')
            ->get();

        $labels = [];
        $expected = [];
        $actual = [];

        foreach ($projects as $project) {
            $labels[] = $project->title;
            $expected[] = \Carbon\Carbon::parse($project->start_date)->diffInDays($project->expected_end_date);
            $actual[] = \Carbon\Carbon::parse($project->start_date)->diffInDays($project->actual_end_date);
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Expected (Days)',
                    'data' => $expected,
                    'backgroundColor' => '#facc15',
                    'borderRadius' => 6,
                    'barThickness' => 20,
                    'maxBarThickness' => 26,
                ],
                [
                    'label' => 'Actual (Days)',
                    'data' => $actual,
                    'backgroundColor' => '#ef4444',
                    'borderRadius' => 6,
                    'barThickness' => 20,
                    'maxBarThickness' => 26,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
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
                    'beginAtZero' => true,
                    'grid' => [
                        'color' => 'rgba(148, 163, 184, 0.2)',
                    ],
                    'ticks' => [
                        'font' => [
                            'size' => 11,
                        ],
                    ],
                ],
                'y' => [
                    'grid' => [
                        'display' => false,
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

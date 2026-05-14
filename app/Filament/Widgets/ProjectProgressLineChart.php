<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class ProjectProgressLineChart extends ChartWidget
{
    protected static ?string $heading = 'Budget vs Duration for Completed Projects';

    protected static ?int $sort = 2;

  protected static ?string $maxHeight = '250px';
    // This makes the widget span full width
    public function getColumnSpan(): int|string
    {
        return 'full';
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $projects = Project::query()
            ->where('status', 'completed')
            ->whereNotNull('start_date')
            ->whereNotNull('actual_end_date')
            ->orderBy('actual_end_date')
            ->get([
                'title',
                'budget',
                'start_date',
                'actual_end_date',
            ]);

        $labels = [];
        $durations = [];
        $budgets = [];

        foreach ($projects as $project) {
            $duration = Carbon::parse($project->start_date)->diffInDays(Carbon::parse($project->actual_end_date));
            $labels[] = $project->title;
            $durations[] = $duration;
            $budgets[] = $project->budget;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Duration (days)',
                    'data' => $durations,
                    'borderColor' => '#f97316', // orange-500
                    'backgroundColor' => 'transparent',
                    'yAxisID' => 'y',
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Budget (PGK)',
                    'data' => $budgets,
                    'borderColor' => '#3b82f6', // blue-500
                    'backgroundColor' => 'transparent',
                    'yAxisID' => 'y1',
                    'tension' => 0.4,
                ],
            ],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'interaction' => [
                'mode' => 'index',
                'intersect' => false,
            ],
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
                    'type' => 'linear',
                    'position' => 'left',
                    'grid' => [
                        'color' => 'rgba(148, 163, 184, 0.2)',
                    ],
                    'title' => [
                        'display' => true,
                        'text' => 'Duration (days)',
                    ],
                    'ticks' => [
                        'font' => [
                            'size' => 11,
                        ],
                    ],
                ],
                'y1' => [
                    'type' => 'linear',
                    'position' => 'right',
                    'grid' => [
                        'drawOnChartArea' => false,
                    ],
                    'title' => [
                        'display' => true,
                        'text' => 'Budget (PGK)',
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

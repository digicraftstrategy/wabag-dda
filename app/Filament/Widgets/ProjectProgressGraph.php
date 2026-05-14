<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\ChartWidget;

class ProjectProgressGraph extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Project Size by Budget (PGK)';
    protected static ?int $sort = 7;

    protected static ?string $maxHeight = '250px';

    public function getColumnSpan(): int|string
    {
        return 'full';
    }
    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $projects = Project::query()
            ->dashboardFilters($this->filters ?? [])
            ->whereNotNull('budget')
            ->orderByDesc('budget')
            ->limit(10) // Show top 10 biggest budgets (optional)
            ->get(['title', 'budget']);

        $labels = $projects->pluck('title')->toArray();
        $budgets = $projects->pluck('budget')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Budget (PGK)',
                    'data' => $budgets,
                    'backgroundColor' => '#10b981', // green-500
                    'borderRadius' => 6,
                    'barThickness' => 20,
                    'maxBarThickness' => 26,
                ],
            ],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'color' => 'rgba(148, 163, 184, 0.2)',
                    ],
                    'title' => [
                        'display' => true,
                        'text' => 'Budget in PGK',
                    ],
                    'ticks' => [
                        'font' => [
                            'size' => 11,
                        ],
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
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
            ],
        ];
    }
}

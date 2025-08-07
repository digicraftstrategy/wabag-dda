<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class ProjectProgressGraph extends ChartWidget
{
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
                ],
            ],
            'options' => [
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'title' => [
                            'display' => true,
                            'text' => 'Budget in PGK',
                        ],
                    ],
                    'x' => [
                        'ticks' => [
                            'maxRotation' => 45,
                            'minRotation' => 0,
                        ],
                    ],
                ],
            ],
        ];
    }
}

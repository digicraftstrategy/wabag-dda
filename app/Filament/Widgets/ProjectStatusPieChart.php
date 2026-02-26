<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Js;

class ProjectStatusPieChart extends ChartWidget
{
    protected static ?string $heading = 'Projects by Status';
    protected static ?string $maxHeight = '250px';
    protected static ?int $sort = 3;

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getData(): array
    {
        $statusOptions = [
            'planned' => 'Planned',
            'approved' => 'Approved',
            'in_progress' => 'In Progress',
            'completed' => 'Completed',
            'delayed' => 'Delayed',
            'cancelled' => 'Cancelled',
        ];

        $counts = collect($statusOptions)
            ->mapWithKeys(fn ($label, $status) => [
                $label => Project::where('status', $status)->count(),
            ]);

        return [
            'labels' => $counts->keys()->toArray(),
            'datasets' => [
                [
                    'data' => $counts->values()->toArray(),
                    'backgroundColor' => [
                        '#facc15', // planned - yellow
                        '#3b82f6', // approved - blue
                        '#10b981', // in progress - green
                        '#8b5cf6', // completed - purple
                        '#f97316', // delayed - orange
                        '#ef4444', // cancelled - red
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'tooltip' => [
                    'callbacks' => [
                        'label' => Js::from(<<<'JS'
                            function(context) {
                                const label = context.label || '';
                                const value = context.parsed;
                                const data = context.dataset.data;
                                const total = data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        JS),
                    ],
                ],
            ],
        ];
    }
}

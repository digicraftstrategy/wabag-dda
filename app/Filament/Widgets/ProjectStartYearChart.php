<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ProjectStartYearChart extends ChartWidget
{
    protected static ?string $heading = 'Projects by Start Year';

    protected static ?int $sort = 9;

    protected static ?string $maxHeight = '250px';

    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }
    protected function getData(): array
    {
        $data = \App\Models\Project::selectRaw('YEAR(start_date) as year, COUNT(*) as total')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('total', 'year');

        return [
            'labels' => $data->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Projects Started',
                    'data' => $data->values()->toArray(),
                    'borderColor' => '#3b82f6',
                    'fill' => false,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}


<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ProjectByFundingSourceChart extends ChartWidget
{
    protected static ?string $heading = 'Projects by Funding Source';

    protected static ?string $maxHeight = '250px';
    public function getColumnSpan(): int|string|array
    {
     return 'full';   
    }
    protected function getData(): array
    {
        $data = \App\Models\FundingSource::withCount('projects')->get();

        return [
            'labels' => $data->pluck('funding_source')->toArray(),
            'datasets' => [
                [
                    'label' => 'Projects',
                    'data' => $data->pluck('projects_count')->toArray(),
                    'backgroundColor' => '#22c55e',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}


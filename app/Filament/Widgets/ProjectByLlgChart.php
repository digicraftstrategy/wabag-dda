<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\Llg;
use Filament\Widgets\ChartWidget;

class ProjectByLlgChart extends ChartWidget
{
    protected static ?string $heading = 'Projects by LLG';
    protected static ?int $sort = 8;

    protected static ?string $maxHeight = '250px';
    protected function getData(): array
    {
        // Count of projects per LLG
        $data = Llg::withCount('projects')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Projects',
                    'data' => $data->pluck('projects_count')->toArray(),
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => $data->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
    /*public function getColumnSpan(): int|string
    {
        return 'full'; //['md' => 2, 'xl' => 2];
    }*/
}

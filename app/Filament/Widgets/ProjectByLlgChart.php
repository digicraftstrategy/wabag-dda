<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\ChartWidget;

class ProjectByLlgChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Projects by LLG';
    protected static ?int $sort = 8;

    protected static ?string $maxHeight = '250px';
    protected function getData(): array
    {
        $projectsByLlg = Project::query()
            ->dashboardFilters($this->filters ?? [])
            ->selectRaw('llg_id, COUNT(*) as total')
            ->groupBy('llg_id')
            ->with('llg')
            ->get();

        $labels = $projectsByLlg->map(fn ($project) => $project->llg?->name ?? 'Unknown')->toArray();
        $counts = $projectsByLlg->pluck('total')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Total Projects',
                    'data' => $counts,
                    'backgroundColor' => '#3b82f6',
                    'borderRadius' => 6,
                    'barThickness' => 20,
                    'maxBarThickness' => 26,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'enabled' => true,
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

    protected function getType(): string
    {
        return 'bar';
    }
    /*public function getColumnSpan(): int|string
    {
        return 'full'; //['md' => 2, 'xl' => 2];
    }*/
}

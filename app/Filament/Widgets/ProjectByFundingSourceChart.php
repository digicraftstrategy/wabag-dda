<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\ChartWidget;

class ProjectByFundingSourceChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Projects by Funding Source';

    protected static ?string $maxHeight = '250px';
    public function getColumnSpan(): int|string|array
    {
     return 'full';   
    }
    protected function getData(): array
    {
        $projectIds = Project::query()
            ->dashboardFilters($this->filters ?? [])
            ->pluck('id');

        if ($projectIds->isEmpty()) {
            return [
                'labels' => [],
                'datasets' => [
                    [
                        'label' => 'Projects',
                        'data' => [],
                        'backgroundColor' => '#22c55e',
                    ],
                ],
            ];
        }

        $data = \App\Models\FundingSource::withCount([
            'projects' => fn ($query) => $query->whereIn('projects.id', $projectIds),
        ])->get();

        return [
            'labels' => $data->pluck('funding_source')->toArray(),
            'datasets' => [
                [
                    'label' => 'Projects',
                    'data' => $data->pluck('projects_count')->toArray(),
                    'backgroundColor' => '#22c55e',
                    'borderRadius' => 6,
                    'barThickness' => 24,
                    'maxBarThickness' => 32,
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
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                    'ticks' => [
                        'font' => [
                            'size' => 11,
                        ],
                        'autoSkip' => true,
                        'maxRotation' => 45,
                        'minRotation' => 45,
                    ],
                ],
                'y' => [
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
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

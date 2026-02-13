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
            'options' => [
                'responsive' => true,
                'interaction' => [
                    'mode' => 'index',
                    'intersect' => false,
                ],
                'scales' => [
                    'y' => [
                        'type' => 'linear',
                        'position' => 'left',
                        'title' => ['display' => true, 'text' => 'Duration (days)'],
                    ],
                    'y1' => [
                        'type' => 'linear',
                        'position' => 'right',
                        'grid' => ['drawOnChartArea' => false],
                        'title' => ['display' => true, 'text' => 'Budget (PGK)'],
                    ],
                ],
            ],
        ];
    }
}

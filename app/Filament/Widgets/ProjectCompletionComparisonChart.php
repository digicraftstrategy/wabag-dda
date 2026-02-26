<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ProjectCompletionComparisonChart extends ChartWidget
{
    protected static ?string $heading = 'Expected vs Actual Completion (Projects)';

    protected static ?int $sort = 10;

    protected static ?string $maxHeight = '250px';

    public function getColumnSpan(): int|string|array
    {
     return 'full';   
    }

    protected function getData(): array
    {
        $projects = \App\Models\Project::whereNotNull('actual_end_date')
            ->whereNotNull('expected_end_date')
            ->get();

        $labels = [];
        $expected = [];
        $actual = [];

        foreach ($projects as $project) {
            $labels[] = $project->title;
            $expected[] = \Carbon\Carbon::parse($project->start_date)->diffInDays($project->expected_end_date);
            $actual[] = \Carbon\Carbon::parse($project->start_date)->diffInDays($project->actual_end_date);
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Expected (Days)',
                    'data' => $expected,
                    'backgroundColor' => '#facc15',
                ],
                [
                    'label' => 'Actual (Days)',
                    'data' => $actual,
                    'backgroundColor' => '#ef4444',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}


<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Js;

class ProjectTimelineChart extends ChartWidget
{
    protected static ?string $heading = 'Project Timeline Progress';
    protected static ?int $sort = 4;
    protected static ?string $maxHeight = '400px';

    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }
    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $projects = Project::orderBy('start_date')->get();

        $labels = [];
        $offsets = [];
        $durations = [];

        foreach ($projects as $project) {
            if (!$project->start_date || !$project->expected_end_date) {
                continue;
            }

            $start = Carbon::parse($project->start_date);
            $end = Carbon::parse($project->expected_end_date);
            $duration = $end->diffInDays($start);

            // Offset from a reference start date (earliest project)
            $labels[] = $project->title;
            $offsets[] = $start->diffInDays($projects->first()->start_date);
            $durations[] = $duration;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Start Offset',
                    'data' => $offsets,
                    'backgroundColor' => 'rgba(0,0,0,0)', // transparent block to offset the bar
                    'stack' => 'timeline',
                ],
                [
                    'label' => 'Duration',
                    'data' => $durations,
                    'backgroundColor' => 'rgba(34,197,94,0.7)', // green bar
                    'borderRadius' => 4,
                    'stack' => 'timeline',
                ],
            ],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
            'responsive' => true,
            'plugins' => [
                'tooltip' => [
                    'callbacks' => [
                        'label' => Js::from(
                            'function(context) {
                                if (context.dataset.label === "Duration") {
                                    return context.dataset.data[context.dataIndex] + " days";
                                }
                                return "";
                            }'
                        ),
                    ],
                ],
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'x' => [
                    'title' => ['display' => true, 'text' => 'Timeline (days from first project)'],
                    'stacked' => true,
                ],
                'y' => [
                    'stacked' => true,
                ],
            ],
        ];
    }
}

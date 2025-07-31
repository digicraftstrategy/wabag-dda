<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
class ProjectTypeChart extends ChartWidget
{
   protected static ?string $heading = 'Project Type Distribution';

   protected static ?string $maxHeight = '250px';

   protected static ?int $sort = 5;
    protected function getData(): array
    {
        // Fetch counts of projects grouped by project_type
        $projectTypes = Project::selectRaw('project_type_id, COUNT(*) as total')
            ->groupBy('project_type_id')
            ->with('type') // eager load the type relationship
            ->get();

        // Prepare labels and data
        $labels = [];
        $data = [];

        foreach ($projectTypes as $project) {
            $labels[] = $project->type?->type ?? 'Unknown';
            $data[] = $project->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Projects by Type',
                    'data' => $data,
                    'backgroundColor' => [
                        '#3B82F6', // blue
                        '#10B981', // green
                        '#F59E0B', // yellow
                        '#EF4444', // red
                        '#6366F1', // indigo
                        '#EC4899', // pink
                        '#8B5CF6', // violet
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }
    protected function getType(): string
    {
        return 'doughnut';
    }
}

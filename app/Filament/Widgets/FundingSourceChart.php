<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use App\Models\FundingSource;

class FundingSourceChart extends ChartWidget
{
    protected static ?string $heading = 'Funding Source Distribution';

    protected static ?int $sort = 4;
    protected static ?string $maxHeight = '250px';
    protected function getData(): array
    {
        // Count projects per funding source from pivot table
        $counts = DB::table('project_funding_source')
            ->select('funding_source_id', DB::raw('COUNT(project_id) as total'))
            ->groupBy('funding_source_id')
            ->pluck('total', 'funding_source_id');

        // Get funding source names
        $fundingSources = FundingSource::whereIn('id', $counts->keys())->get();

        $labels = [];
        $data = [];

        foreach ($fundingSources as $source) {
            $labels[] = $source->funding_source;
            $data[] = $counts[$source->id] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Projects by Funding Source',
                    'data' => $data,
                    'backgroundColor' => [
                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444',
                        '#6366F1',
                        '#EC4899',
                        '#8B5CF6',
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

<?php

namespace App\Filament\Widgets;

use App\Models\Ward;
use Filament\Widgets\ChartWidget;

class ProjectBudgetByWardChart extends ChartWidget
{
    protected static ?string $heading = 'Project Budgets by Ward';

    protected static ?int $sort = 11;

    protected static ?string $maxHeight = '250px';
    protected function getData(): array
    {
        $data = Ward::with(['projects' => function ($query) {
            $query->selectRaw('ward_id, SUM(budget) as total_budget')
                ->groupBy('ward_id');
        }])->get();

        $labels = [];
        $values = [];

        foreach ($data as $ward) {
            $labels[] = $ward->name;
            $values[] = $ward->projects->sum('budget');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Budget (PGK)',
                    'data' => $values,
                    'backgroundColor' => '#10b981',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    public function getColumnSpan(): int|string
    {
        return 'full';//['md' => 2, 'xl' => 2];
    }
}

@php
    use App\Models\DashboardFilterPreset;
    use App\Models\FundingSource;
    use App\Models\Llg;
    use App\Models\NewsUpdate;
    use App\Models\Project;
    use App\Models\ProjectType;
    use App\Models\Ward;

    $filters = $this->filters ?? [];
    $projectQuery = Project::query()->dashboardFilters($filters);
    $statusFilters = $filters;
    unset($statusFilters['status']);
    $statusQuery = Project::query()->dashboardFilters($statusFilters);

    $totalProjects = (clone $projectQuery)->count();
    $totalBudget = (clone $projectQuery)->sum('budget');
    $totalSpent = (clone $projectQuery)->sum('amount_spent');
    $remainingBudget = $totalBudget - $totalSpent;
    $utilizationRate = $totalBudget > 0 ? round(($totalSpent / $totalBudget) * 100, 1) : 0;

    $completedCount = (clone $statusQuery)->where('status', Project::STATUS_COMPLETED)->count();
    $inProgressCount = (clone $statusQuery)->where('status', Project::STATUS_IN_PROGRESS)->count();
    $delayedCount = (clone $statusQuery)->where('status', Project::STATUS_DELAYED)->count();
    $plannedCount = (clone $statusQuery)->where('status', Project::STATUS_PLANNED)->count();
    $approvedCount = (clone $statusQuery)->where('status', Project::STATUS_APPROVED)->count();
    $cancelledCount = (clone $statusQuery)->where('status', Project::STATUS_CANCELLED)->count();

    $overBudgetCount = (clone $projectQuery)->whereColumn('amount_spent', '>', 'budget')->count();
    $nearBudgetCount = (clone $projectQuery)->whereRaw('amount_spent >= budget * 0.9')->count();
    $overdueCount = (clone $projectQuery)->whereNull('actual_end_date')
        ->whereNotNull('expected_end_date')
        ->where('expected_end_date', '<', now())
        ->count();

    $atRiskProjects = (clone $projectQuery)
        ->whereIn('status', [Project::STATUS_APPROVED, Project::STATUS_IN_PROGRESS, Project::STATUS_DELAYED])
        ->where(function ($query) {
            $query->whereColumn('amount_spent', '>', 'budget')
                ->orWhere('status', Project::STATUS_DELAYED)
                ->orWhere('expected_end_date', '<', now());
        })
        ->orderByRaw("CASE WHEN status = 'delayed' THEN 0 ELSE 1 END")
        ->orderBy('expected_end_date')
        ->limit(5)
        ->get(['id', 'title', 'status', 'budget', 'amount_spent', 'expected_end_date', 'progress_percentage']);

    $topBudgets = (clone $projectQuery)->orderByDesc('budget')
        ->limit(5)
        ->get(['id', 'title', 'status', 'budget', 'amount_spent', 'expected_end_date']);

    $latestUpdateAt = (clone $projectQuery)->max('updated_at');

    $activePresetName = null;
    if (! empty($filters['preset_id'])) {
        $activePresetName = DashboardFilterPreset::query()
            ->where('id', $filters['preset_id'])
            ->value('name');
    }

    $statusLabels = [
        'planned' => 'Planned',
        'approved' => 'Approved',
        'in_progress' => 'In Progress',
        'completed' => 'Completed',
        'delayed' => 'Delayed',
        'cancelled' => 'Cancelled',
    ];

    $activeBadges = [];
    if ($activePresetName) {
        $activeBadges[] = "Preset: {$activePresetName}";
    }
    if (! empty($filters['status'])) {
        $activeBadges[] = "Status: " . ($statusLabels[$filters['status']] ?? $filters['status']);
    }
    if (! empty($filters['project_type_id'])) {
        $typeName = ProjectType::query()->where('id', $filters['project_type_id'])->value('type');
        $activeBadges[] = "Project Type: " . ($typeName ?? 'Unknown');
    }
    if (! empty($filters['funding_source_id'])) {
        $fundingName = FundingSource::query()->where('id', $filters['funding_source_id'])->value('funding_source');
        $activeBadges[] = "Funding: " . ($fundingName ?? 'Unknown');
    }
    if (! empty($filters['llg_id'])) {
        $llgName = Llg::query()->where('id', $filters['llg_id'])->value('name');
        $activeBadges[] = "LLG: " . ($llgName ?? 'Unknown');
    }
    if (! empty($filters['ward_id'])) {
        $wardName = Ward::query()->where('id', $filters['ward_id'])->value('name');
        $activeBadges[] = "Ward: " . ($wardName ?? 'Unknown');
    }
    if (! empty($filters['start_date_from']) || ! empty($filters['start_date_to'])) {
        $from = $filters['start_date_from'] ?? '...';
        $to = $filters['start_date_to'] ?? '...';
        $activeBadges[] = "Start Date: {$from} to {$to}";
    }

    $insights = [];
    if ($overBudgetCount > 0) {
        $insights[] = "{$overBudgetCount} project(s) are over budget. Trigger audit reviews and reforecast allocations.";
    }
    if ($overdueCount > 0) {
        $insights[] = "{$overdueCount} project(s) are past expected end dates. Replan schedules or flag delays.";
    }
    if ($delayedCount > 0) {
        $insights[] = "{$delayedCount} project(s) are marked delayed. Focus on blocker removal and contractor support.";
    }
    if ($totalProjects > 0 && $completedCount / $totalProjects < 0.4 && $utilizationRate > 70) {
        $insights[] = "Spend is advancing faster than completions. Prioritize delivery milestones before new commitments.";
    }
    if (empty($insights)) {
        $insights[] = "No critical risks detected. Maintain delivery cadence and keep budgets aligned with milestones.";
    }
@endphp

<x-filament::page class="dashboard-page">
    <style>
        .dashboard-page > section { padding-top: 0; }
        .dashboard-page { margin-top: 0; }
    </style>
    <div class="space-y-8">
        <div class="-mx-6 mt-0 rounded-2xl bg-gradient-to-r from-slate-900 via-slate-800 to-emerald-900 px-6 pt-6 pb-6 text-white shadow-sm ring-1 ring-slate-900/10">
            <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold">Wabag DDA Admin Dashboard</h1>
                    <p class="mt-2 text-sm text-slate-100/90">
                        A decision-ready view of delivery status, funding utilization, and accountability metrics.
                        @if($latestUpdateAt)
                            <span class="ml-2 text-slate-200/80">Last updated {{ \Illuminate\Support\Carbon::parse($latestUpdateAt)->diffForHumans() }}.</span>
                        @endif
                    </p>
                </div>
                <a
                    href="{{ \App\Filament\Pages\NewsDashboard::getUrl() }}"
                    class="inline-flex items-center justify-center rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-xs font-semibold text-white shadow-sm hover:bg-white/20"
                >
                    View News Updates
                </a>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">Dashboard Overview</div>
        </div>

        <div>
            <x-filament-widgets::widgets
                :widgets="[\App\Filament\Widgets\ProjectTrackerStats::class]"
                :columns="1"
            />
        </div>
        @if (method_exists($this, 'getFiltersForm'))
            <div class="rounded-xl bg-slate-50/80 p-6 shadow-sm ring-1 ring-slate-200">
                <div class="rounded-lg bg-gradient-to-r from-slate-900 via-slate-700 to-slate-500 px-4 py-3 text-white">
                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <div class="text-sm font-semibold">Filter Portfolio</div>
                        <x-filament::button color="gray" size="sm" wire:click="resetFilters">
                            Reset Filters
                        </x-filament::button>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $this->filtersForm }}
                </div>
                @if (! empty($activeBadges))
                    <div class="mt-4 flex flex-wrap gap-2 text-xs text-slate-700">
                        @foreach ($activeBadges as $badge)
                            <span class="rounded-full bg-slate-100 px-3 py-1">{{ $badge }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
            <div class="rounded-xl bg-emerald-50/70 p-6 shadow-sm ring-1 ring-emerald-100">
                <div class="text-sm text-gray-500">Total Budget (PGK)</div>
                <div class="text-2xl font-semibold text-gray-900 mt-1">{{ number_format($totalBudget, 2) }}</div>
                <div class="text-xs text-gray-500 mt-2">Across {{ $totalProjects }} projects</div>
            </div>
            <div class="rounded-xl bg-blue-50/70 p-6 shadow-sm ring-1 ring-blue-100">
                <div class="text-sm text-gray-500">Amount Spent (PGK)</div>
                <div class="text-2xl font-semibold text-gray-900 mt-1">{{ number_format($totalSpent, 2) }}</div>
                <div class="text-xs text-gray-500 mt-2">Utilization {{ $utilizationRate }}%</div>
            </div>
            <div class="rounded-xl bg-amber-50/70 p-6 shadow-sm ring-1 ring-amber-100">
                <div class="text-sm text-gray-500">Remaining Budget (PGK)</div>
                <div class="text-2xl font-semibold text-gray-900 mt-1">{{ number_format($remainingBudget, 2) }}</div>
                <div class="text-xs text-gray-500 mt-2">Near-budget projects: {{ $nearBudgetCount }}</div>
            </div>
        </div>

        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-emerald-100">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-emerald-700">Delivery Status Mix</h2>
                    <p class="text-sm text-gray-600">Live breakdown of the portfolio by status.</p>
                </div>
                <div class="flex flex-wrap gap-3 text-xs text-gray-600">
                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-emerald-700">Completed: {{ $completedCount }}</span>
                    <span class="rounded-full bg-amber-50 px-3 py-1 text-amber-700">In Progress: {{ $inProgressCount }}</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-blue-700">Approved: {{ $approvedCount }}</span>
                    <span class="rounded-full bg-slate-50 px-3 py-1 text-slate-700">Planned: {{ $plannedCount }}</span>
                    <span class="rounded-full bg-rose-50 px-3 py-1 text-rose-700">Delayed: {{ $delayedCount }}</span>
                    <span class="rounded-full bg-gray-100 px-3 py-1 text-gray-600">Cancelled: {{ $cancelledCount }}</span>
                </div>
            </div>
            <div class="mt-4 h-2 w-full rounded-full bg-gray-100">
                @php
                    $safeTotal = max($totalProjects, 1);
                    $completedPct = round(($completedCount / $safeTotal) * 100, 1);
                    $inProgressPct = round(($inProgressCount / $safeTotal) * 100, 1);
                    $approvedPct = round(($approvedCount / $safeTotal) * 100, 1);
                    $plannedPct = round(($plannedCount / $safeTotal) * 100, 1);
                    $delayedPct = round(($delayedCount / $safeTotal) * 100, 1);
                @endphp
                <div class="flex h-2 w-full overflow-hidden rounded-full">
                    <div class="bg-emerald-500" style="width: {{ $completedPct }}%"></div>
                    <div class="bg-amber-400" style="width: {{ $inProgressPct }}%"></div>
                    <div class="bg-blue-500" style="width: {{ $approvedPct }}%"></div>
                    <div class="bg-slate-400" style="width: {{ $plannedPct }}%"></div>
                    <div class="bg-rose-500" style="width: {{ $delayedPct }}%"></div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-xl bg-blue-50/60 p-6 shadow-sm ring-1 ring-blue-100">
                <div class="rounded-lg bg-gradient-to-r from-slate-900 via-slate-700 to-slate-500 px-4 py-3 text-white">
                    <h2 class="text-lg font-semibold">Financial Health</h2>
                    <p class="text-sm text-blue-100/90 mt-1">Budget utilization aligned to delivery milestones.</p>
                </div>
                <div class="mt-4">
                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <span>Utilization</span>
                        <span>{{ $utilizationRate }}%</span>
                    </div>
                    <div class="mt-2 h-2 w-full rounded-full bg-gray-100">
                        <div class="h-2 rounded-full bg-emerald-500" style="width: {{ min(100, max(0, $utilizationRate)) }}%"></div>
                    </div>
                </div>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-lg bg-slate-50 p-4">
                        <div class="text-xs text-slate-500">Near Budget (90%+)</div>
                        <div class="text-lg font-semibold text-slate-900 mt-1">{{ $nearBudgetCount }}</div>
                    </div>
                    <div class="rounded-lg bg-slate-50 p-4">
                        <div class="text-xs text-slate-500">Overdue Projects</div>
                        <div class="text-lg font-semibold text-slate-900 mt-1">{{ $overdueCount }}</div>
                    </div>
                    <div class="rounded-lg bg-slate-50 p-4">
                        <div class="text-xs text-slate-500">Delayed Projects</div>
                        <div class="text-lg font-semibold text-slate-900 mt-1">{{ $delayedCount }}</div>
                    </div>
                    <div class="rounded-lg bg-slate-50 p-4">
                        <div class="text-xs text-slate-500">Over Budget Projects</div>
                        <div class="text-lg font-semibold text-slate-900 mt-1">{{ $overBudgetCount }}</div>
                    </div>
                </div>
                <div class="mt-6 rounded-lg bg-emerald-50 p-4 text-xs text-emerald-700">
                    Accountability focus: match expenditure to verified milestones and publish updates quarterly.
                </div>
            </div>

            <div class="rounded-xl bg-amber-50/60 p-6 shadow-sm ring-1 ring-amber-100">
                <div class="rounded-lg bg-gradient-to-r from-slate-900 via-slate-700 to-slate-500 px-4 py-3 text-white">
                    <h2 class="text-lg font-semibold">Decision Insights</h2>
                    <p class="text-sm text-amber-100/90 mt-1">Focused guidance to improve delivery and transparency.</p>
                </div>
                <div class="mt-4 space-y-3 text-sm text-gray-700">
                    @foreach ($insights as $insight)
                        <div class="flex items-start gap-2">
                            <span class="mt-1 h-2 w-2 rounded-full bg-emerald-500"></span>
                            <span>{{ $insight }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6 rounded-lg bg-slate-50 p-4 text-xs text-slate-600">
                    Transparency objective: align spending with milestones and publish progress regularly.
                </div>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-xl bg-rose-50/60 p-6 shadow-sm ring-1 ring-rose-100">
                <div class="rounded-lg bg-gradient-to-r from-slate-900 via-slate-700 to-slate-500 px-4 py-3 text-white">
                    <h2 class="text-lg font-semibold">At-Risk Projects</h2>
                    <p class="text-sm text-rose-100/90 mt-1">Overdue, delayed, or over-budget items needing attention.</p>
                </div>
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="text-left text-xs text-gray-500 uppercase">
                            <tr>
                                <th class="py-2 pr-4">Project</th>
                                <th class="py-2 pr-4">Status</th>
                                <th class="py-2 pr-4">Budget Use</th>
                                <th class="py-2">Expected End</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            @forelse ($atRiskProjects as $project)
                                @php
                                    $budgetUse = $project->budget > 0
                                        ? round(($project->amount_spent / $project->budget) * 100, 1)
                                        : 0;
                                @endphp
                                <tr>
                                    <td class="py-3 pr-4 font-medium text-gray-900">{{ $project->title }}</td>
                                    <td class="py-3 pr-4">{{ $project->status_label }}</td>
                                    <td class="py-3 pr-4">{{ $budgetUse }}%</td>
                                    <td class="py-3">
                                        {{ $project->expected_end_date ? $project->expected_end_date->format('M d, Y') : 'Not set' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-4 text-gray-500">No at-risk projects identified.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="rounded-xl bg-indigo-50/60 p-6 shadow-sm ring-1 ring-indigo-100">
                <div class="rounded-lg bg-gradient-to-r from-slate-900 via-slate-700 to-slate-500 px-4 py-3 text-white">
                    <h2 class="text-lg font-semibold">Top Budget Commitments</h2>
                    <p class="text-sm text-indigo-100/90 mt-1">Largest budgets to monitor for value delivery.</p>
                </div>
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="text-left text-xs text-gray-500 uppercase">
                            <tr>
                                <th class="py-2 pr-4">Project</th>
                                <th class="py-2 pr-4">Status</th>
                                <th class="py-2 pr-4">Budget (PGK)</th>
                                <th class="py-2">Spent (PGK)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            @forelse ($topBudgets as $project)
                                <tr>
                                    <td class="py-3 pr-4 font-medium text-gray-900">{{ $project->title }}</td>
                                    <td class="py-3 pr-4">{{ $project->status_label }}</td>
                                    <td class="py-3 pr-4">{{ number_format($project->budget, 2) }}</td>
                                    <td class="py-3">{{ number_format($project->amount_spent, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-4 text-gray-500">No budget data available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <x-filament-widgets::widgets
                :widgets="[\App\Filament\Widgets\ProjectByLlgChart::class]"
                :columns="1"
            />
            <x-filament-widgets::widgets
                :widgets="[\App\Filament\Widgets\ProjectTypeChart::class]"
                :columns="1"
            />
        </div>

        <div>
            <x-filament-widgets::widgets
                :widgets="[
                    \App\Filament\Widgets\ProjectByFundingSourceChart::class,
                ]"
                :columns="[
                    'md' => 2,
                    'xl' => 2,
                ]"
            />
        </div>
    </div>
</x-filament::page>

<?php

namespace App\Filament\Pages;

use App\Models\DashboardFilterPreset;
use App\Models\FundingSource;
use App\Models\Llg;
use App\Models\ProjectType;
use App\Models\Ward;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Pages\Page;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Filament\Widgets\{
    ProjectKpiOverview,
    ProjectTrackerStats,
    ProjectTimelineChart,
    ProjectProgressGraph,
    RecentNewsUpdates,
    ProjectStatusPieChart,
    ProjectProgressLineChart,
    ProjectTypeChart,
    FundingSourceChart,
    ProjectByLlgChart,
    ProjectBudgetByWardChart,
    ProjectStartYearChart,
    ProjectCompletionComparisonChart,
    ProjectByFundingSourceChart,
    AverageBudgetByProjectTypeChart,
};

class Dashboard extends Page
{
    use HasFiltersForm;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.project-tracker-dashboard';
    protected static ?string $title = 'Wabag DDA Admin Dashboard';
    protected static ?string $navigationLabel = 'Dashboard';
    protected ?string $heading = '';
    //protected static ?string $title = 'Project Tracker Dashboard';

    /*public static function getSlug(): string
    {
        return 'custom-dashboard'; // Unique route slug
    }*/

    public static function shouldRegisterNavigation(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();
        return $user && ($user->hasRole(['admin', 'project-officer', 'media-officer']) || $user->can('view dashboard'));
    }

    public function getHeading(): string
    {
        return '';
    }

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Filter Portfolio')
                    ->schema([
                        Select::make('preset_id')
                            ->label('Saved Presets')
                            ->options($this->getPresetOptions())
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set): void {
                                if (! $state) {
                                    return;
                                }

                                $preset = DashboardFilterPreset::query()
                                    ->where('user_id', Auth::id())
                                    ->find($state);

                                if (! $preset) {
                                    return;
                                }

                                $presetFilters = $preset->filters ?? [];
                                $fields = [
                                    'start_date_from',
                                    'start_date_to',
                                    'status',
                                    'project_type_id',
                                    'funding_source_id',
                                    'llg_id',
                                    'ward_id',
                                ];

                                foreach ($fields as $field) {
                                    $set($field, $presetFilters[$field] ?? null);
                                }

                                $set('preset', null);
                            }),
                        Select::make('preset')
                            ->label('Preset')
                            ->options([
                                'all' => 'All Projects',
                                'current_year' => 'Current Year',
                                'last_12_months' => 'Last 12 Months',
                                'in_progress' => 'In Progress',
                                'approved' => 'Approved',
                                'delayed' => 'Delayed',
                                'completed' => 'Completed',
                            ])
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set): void {
                                if (! $state) {
                                    return;
                                }

                                $set('preset_id', null);
                                $set('status', null);
                                $set('project_type_id', null);
                                $set('funding_source_id', null);
                                $set('llg_id', null);
                                $set('ward_id', null);
                                $set('start_date_from', null);
                                $set('start_date_to', null);

                                if ($state === 'current_year') {
                                    $set('start_date_from', Carbon::now()->startOfYear()->toDateString());
                                    $set('start_date_to', Carbon::now()->endOfYear()->toDateString());
                                }

                                if ($state === 'last_12_months') {
                                    $set('start_date_from', Carbon::now()->subMonths(12)->toDateString());
                                    $set('start_date_to', Carbon::now()->toDateString());
                                }

                                if ($state === 'in_progress') {
                                    $set('status', 'in_progress');
                                }

                                if ($state === 'approved') {
                                    $set('status', 'approved');
                                }

                                if ($state === 'delayed') {
                                    $set('status', 'delayed');
                                }

                                if ($state === 'completed') {
                                    $set('status', 'completed');
                                }
                            }),
                        DatePicker::make('start_date_from')
                            ->label('Start Date From'),
                        DatePicker::make('start_date_to')
                            ->label('Start Date To'),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'planned' => 'Planned',
                                'approved' => 'Approved',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                                'delayed' => 'Delayed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->searchable(),
                        Select::make('project_type_id')
                            ->label('Project Type')
                            ->options(ProjectType::orderBy('type')->pluck('type', 'id'))
                            ->searchable(),
                        Select::make('funding_source_id')
                            ->label('Funding Source')
                            ->options(FundingSource::orderBy('funding_source')->pluck('funding_source', 'id'))
                            ->searchable(),
                        Select::make('llg_id')
                            ->label('LLG')
                            ->options(Llg::orderBy('name')->pluck('name', 'id'))
                            ->searchable(),
                        Select::make('ward_id')
                            ->label('Ward')
                            ->options(Ward::orderBy('name')->pluck('name', 'id'))
                            ->searchable(),
                    ])
                    ->columns([
                        'md' => 3,
                        'xl' => 4,
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('savePreset')
                ->label('Save Preset')
                ->form([
                    TextInput::make('name')
                        ->label('Preset Name')
                        ->required(),
                    Toggle::make('is_default')
                        ->label('Set as default'),
                ])
                ->action(function (array $data): void {
                    $userId = Auth::id();
                    if (! $userId) {
                        return;
                    }

                    $filters = $this->filters ?? [];
                    unset($filters['preset'], $filters['preset_id']);

                    if ($data['is_default'] ?? false) {
                        DashboardFilterPreset::query()
                            ->where('user_id', $userId)
                            ->update(['is_default' => false]);
                    }

                    $preset = DashboardFilterPreset::updateOrCreate(
                        ['user_id' => $userId, 'name' => $data['name']],
                        ['filters' => $filters, 'is_default' => (bool) ($data['is_default'] ?? false)]
                    );

                    $this->filters = array_merge($filters, ['preset_id' => $preset->id]);
                    $this->updatedFilters();
                }),
            Action::make('managePresets')
                ->label('Manage Presets')
                ->form([
                    Repeater::make('presets')
                        ->label('Saved Presets')
                        ->schema([
                            Hidden::make('id'),
                            TextInput::make('name')
                                ->label('Preset Name')
                                ->required(),
                            Toggle::make('is_default')
                                ->label('Default'),
                            Toggle::make('delete')
                                ->label('Delete')
                                ->helperText('Mark to remove this preset.'),
                        ])
                        ->columns([
                            'md' => 4,
                        ])
                        ->default([]),
                ])
                ->mountUsing(function (Form $form): void {
                    $userId = Auth::id();
                    if (! $userId) {
                        $form->fill(['presets' => []]);
                        return;
                    }

                    $presets = DashboardFilterPreset::query()
                        ->where('user_id', $userId)
                        ->orderByDesc('is_default')
                        ->orderBy('name')
                        ->get(['id', 'name', 'is_default'])
                        ->map(fn ($preset) => [
                            'id' => $preset->id,
                            'name' => $preset->name,
                            'is_default' => $preset->is_default,
                            'delete' => false,
                        ])
                        ->toArray();

                    $form->fill(['presets' => $presets]);
                })
                ->action(function (array $data): void {
                    $userId = Auth::id();
                    if (! $userId) {
                        return;
                    }

                    $presets = $data['presets'] ?? [];
                    $defaultId = null;

                    foreach ($presets as $preset) {
                        if (! empty($preset['delete'])) {
                            DashboardFilterPreset::query()
                                ->where('user_id', $userId)
                                ->where('id', $preset['id'] ?? null)
                                ->delete();
                            continue;
                        }

                        DashboardFilterPreset::query()
                            ->where('user_id', $userId)
                            ->where('id', $preset['id'] ?? null)
                            ->update([
                                'name' => $preset['name'] ?? 'Untitled',
                                'is_default' => (bool) ($preset['is_default'] ?? false),
                            ]);

                        if (! $defaultId && ! empty($preset['is_default'])) {
                            $defaultId = $preset['id'] ?? null;
                        }
                    }

                    if ($defaultId) {
                        DashboardFilterPreset::query()
                            ->where('user_id', $userId)
                            ->where('id', '!=', $defaultId)
                            ->update(['is_default' => false]);
                    }

                    if (isset($this->filters['preset_id'])) {
                        $currentPreset = DashboardFilterPreset::query()
                            ->where('user_id', $userId)
                            ->where('id', $this->filters['preset_id'])
                            ->exists();

                        if (! $currentPreset) {
                            $this->filters['preset_id'] = null;
                            $this->updatedFilters();
                        }
                    }
                }),
            Action::make('resetFilters')
                ->label('Reset Filters')
                ->color('gray')
                ->action(fn () => $this->resetFilters()),
        ];
    }

    protected function getPresetOptions(): array
    {
        $userId = Auth::id();
        if (! $userId) {
            return [];
        }

        return DashboardFilterPreset::query()
            ->where('user_id', $userId)
            ->orderByDesc('is_default')
            ->orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }

    public function resetFilters(): void
    {
        $this->filters = null;
        session()->forget($this->getFiltersSessionKey());
        $this->updatedFilters();
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //ProjectTrackerStats::class,
            //ProjectKpiOverview::class,
            //ProjectProgressLineChart::class,
            //ProjectProgressGraph::class,
            //ProjectTimelineChart::class,
            //ProjectTypeChart::class,
            //FundingSourceChart::class,
            //ProjectStatusPieChart::class,
            /////////////////////////////
            //ProjectByLlgChart::class,
            //ProjectStartYearChart::class,
            //ProjectBudgetByWardChart::class,
            //ProjectCompletionComparisonChart::class,
            //ProjectByFundingSourceChart::class,
            //AverageBudgetByProjectTypeChart::class,
            //RecentNewsUpdates::class,
        ];
    }
}

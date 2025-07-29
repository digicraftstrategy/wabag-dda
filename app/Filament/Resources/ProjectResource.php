<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\FundingSource;
use App\Models\Ward;
use App\Models\Llg;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Hidden;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Project Management';
    protected static ?string $modelLabel = 'Project';
    protected static ?string $navigationLabel = 'Projects';
    protected static ?int $navigationSort = 1;

    public static function canAccess(): bool
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        return $user && $user->hasAnyRole(['admin', 'project-officer']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('project_code')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50)
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        Forms\Components\Select::make('project_type_id')
                            ->label('Project Type')
                            ->required()
                            ->options(ProjectType::pluck('type', 'id'))
                            ->searchable()
                            ->columnSpan(1),

                        Forms\Components\Select::make('funding_source_id')
                            ->label('Funding Source')
                            ->required()
                            ->options(FundingSource::pluck('funding_source', 'id'))
                            ->searchable()
                            ->columnSpan(1),
                    ])->columns(4),

                Section::make('Location Details')
                    ->schema([
                        Forms\Components\Select::make('llg_id')
                            ->label('LLG')
                            ->required()
                            ->options(Llg::orderBy('name')->pluck('name', 'id'))
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn (Set $set) => $set('ward_id', null))
                            ->columnSpan(1),

                        Forms\Components\Select::make('ward_id')
                            ->label('Ward')
                            ->required()
                            ->options(fn (Get $get): Collection =>
                                Ward::where('llg_id', $get('llg_id'))
                                    ->orderBy('name')
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->disabled(fn (Get $get) => !$get('llg_id'))
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('coordinates')
                            ->maxLength(255)
                            ->columnSpan(1),
                    ])->columns(4),

                Section::make('Financial Information')
                    ->schema([
                        Forms\Components\TextInput::make('budget')
                            ->required()
                            ->numeric()
                            ->prefix('PGK')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('amount_spent')
                            ->numeric()
                            ->prefix('PGK')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('progress_percentage')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('%')
                            ->columnSpan(1),
                    ])->columns(3),

                Section::make('Timeline')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->required()
                            ->columnSpan(1),

                        Forms\Components\DatePicker::make('expected_end_date')
                            ->required()
                            ->columnSpan(1),

                        Forms\Components\DatePicker::make('actual_end_date')
                            ->columnSpan(1),
                    ])->columns(3),

                Section::make('Status & Visibility')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'planned' => 'Planned',
                                'approved' => 'Approved',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                                'delayed' => 'Delayed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required()
                            ->columnSpan(1),

                        Forms\Components\Toggle::make('is_public')
                            ->label('Publicly Visible')
                            ->onIcon('heroicon-o-eye')
                            ->offIcon('heroicon-o-eye-slash')
                            ->columnSpan(1),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->columnSpan(1),
                    ])->columns(3),

                Section::make('Description & Media')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('featured_image')
                            ->image()
                            ->directory('projects/featured-images')
                            ->columnSpanFull(),
                    ]),

                Hidden::make('created_by')
                    ->default(auth()->id())
                    ->disabled()
                    ->dehydrated(),

                Hidden::make('updated_by')
                    ->default(auth()->id())
                    ->disabled()
                    ->dehydrated(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project_code')
                    ->label('Code')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->tooltip(fn (Project $record) => $record->title),

                TextColumn::make('type.type')
                    ->label('Type')
                    ->sortable(),

                TextColumn::make('ward.name')
                    ->label('Ward')
                    ->sortable(),

                TextColumn::make('llg.name')
                    ->label('LLG')
                    ->sortable(),

                TextColumn::make('budget')
                    ->money('PGK')
                    ->sortable(),

                TextColumn::make('progress_percentage')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable()
                    ->color(fn (string $state): string => match (true) {
                        $state >= 80 => 'success',
                        $state >= 50 => 'warning',
                        default => 'danger',
                    }),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'in_progress' => 'primary',
                        'delayed' => 'warning',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                IconColumn::make('is_public')
                    ->label('Public')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-eye-slash')
                    ->sortable(),

                TextColumn::make('createdBy.name')
                    ->label('Created By')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updatedBy.name')
                    ->label('Last Updated By')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('start_date')
                    ->date()
                    ->sortable(),

                TextColumn::make('deleted_at')
                    ->label('Deleted On')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('project_type_id')
                    ->label('Project Type')
                    ->options(ProjectType::pluck('type', 'id'))
                    ->multiple(),

                SelectFilter::make('llg_id')
                    ->label('LLG')
                    ->options(Llg::pluck('name', 'id'))
                    ->searchable()
                    ->multiple(),

                SelectFilter::make('ward_id')
                    ->label('Ward')
                    ->options(Ward::pluck('name', 'id'))
                    ->searchable()
                    ->multiple(),

                SelectFilter::make('status')
                    ->options([
                        'planned' => 'Planned',
                        'approved' => 'Approved',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'delayed' => 'Delayed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->multiple(),

                TernaryFilter::make('is_public')
                    ->label('Publicly Visible'),

                TrashedFilter::make()
                    ->label('Deleted Status')
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
<<<<<<< HEAD
                Tables\Actions\EditAction::make()
                    ->hidden(fn (Project $record): bool => $record->trashed()),

                Tables\Actions\DeleteAction::make()
                    ->hidden(fn (Project $record): bool => $record->trashed())
                    ->using(function (Project $record) {
                        $record->updates()->delete(); // Soft delete related updates
                        $record->delete(); // This will soft delete the project
                    }),

                Tables\Actions\RestoreAction::make()
                    ->before(function (Project $record) {
                        $record->updates()->onlyTrashed()->restore();
                    }),

                Tables\Actions\ForceDeleteAction::make()
                    ->before(function (Project $record) {
                        $record->updates()->withTrashed()->forceDelete();
=======
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('delete projects');
>>>>>>> 4db544d00a7578ef3efb49580b93c6fb541581f5
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->using(function (Collection $records) {
                            $records->each(function (Project $record) {
                                $record->updates()->delete();
                                $record->delete();
                            });
                        }),

                    Tables\Actions\RestoreBulkAction::make()
                        ->before(function (Collection $records) {
                            $records->each(function (Project $record) {
                                $record->updates()->onlyTrashed()->restore();
                            });
                        }),

                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->before(function (Collection $records) {
                            $records->each(function (Project $record) {
                                $record->updates()->withTrashed()->forceDelete();
                            });
                        }),
                ]),
            ])
            ->defaultSort('start_date', 'desc')
            ->persistFiltersInSession();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::withoutTrashed()->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'primary';
    }
}

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

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationGroup = 'Project Management';
    protected static ?string $modelLabel = 'Project';
    protected static ?string $navigationLabel = 'Projects';

    public static function canAccess(): bool
    {
       /** @var User|null $user */
        $user = Auth::user();
        return $user && $user->hasAnyRole(['admin', 'project-officer']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('project_code')
                            ->required()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('project_type_id')
                            ->label('Project Type')
                            ->required()
                            ->options(
                                ProjectType::query()
                                    ->orderBy('type')
                                    ->pluck('type', 'id')
                            )
                            ->searchable(),
                        Forms\Components\Select::make('funding_source_id')
                            ->label('Funding Source')
                            ->required()
                            ->options(
                                FundingSource::query()
                                    ->orderBy('funding_source')
                                    ->pluck('funding_source', 'id')
                            )
                            ->searchable(),
                    ])->columns(2),

                Forms\Components\Section::make('Location Details')
                    ->schema([
                        Forms\Components\Select::make('llg_id')
                            ->label('LLG')
                            ->required()
                            ->options(Llg::query()->orderBy('name')->pluck('name', 'id'))
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn (Set $set) => $set('ward_id', null)),

                        Forms\Components\Select::make('ward_id')
                            ->label('Ward')
                            ->required()
                            ->options(function (Get $get): Collection {
                                return Ward::query()
                                    ->where('llg_id', $get('llg_id'))
                                    ->orderBy('name')
                                    ->pluck('name', 'id');
                            })
                            ->searchable()
                            ->disabled(fn (Get $get) => !$get('llg_id')),

                        Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('coordinates')
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Project Details')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('budget')
                            ->numeric()
                            ->prefix('PGK'),
                        Forms\Components\TextInput::make('amount_spent')
                            ->numeric()
                            ->prefix('PGK'),
                    ])->columns(2),

                Forms\Components\Section::make('Timeline')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->required(),
                        Forms\Components\DatePicker::make('expected_end_date')
                            ->required(),
                        Forms\Components\DatePicker::make('actual_end_date'),
                    ])->columns(3),

                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'planned' => 'Planned',
                                'tending' => 'Tendering',
                                'awarded' => 'Awarded',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                                'suspended' => 'Suspended',
                                'terminated' => 'Terminated',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('progress_percentage')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('%'),
                        Forms\Components\Toggle::make('approved'),
                        Forms\Components\DateTimePicker::make('approved_at'),
                        Forms\Components\TextInput::make('approved_by')
                            ->label('Approved By')
                            ->maxLength(255),
                    ])->columns(3),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('featured_image')
                            ->image()
                            ->directory('project-images')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('projectType.type')
                    ->label('Type'),
                Tables\Columns\TextColumn::make('llg.name')
                    ->label('LLG'),
                Tables\Columns\TextColumn::make('ward.name')
                    ->label('Ward'),
                Tables\Columns\TextColumn::make('budget')
                    ->money('PGK'),
                Tables\Columns\TextColumn::make('progress_percentage')
                    ->suffix('%'),
                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'planned' => 'Planned',
                        'tending' => 'Tendering',
                        'awarded' => 'Awarded',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'suspended' => 'Suspended',
                        'terminated' => 'Terminated',
                    ]),
                Tables\Columns\IconColumn::make('approved')
                    ->boolean(),
                Tables\Columns\TextColumn::make('approved_by')
                    ->label('Approved By'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('project_type_id')
                    ->label('Project Type')
                    ->options(ProjectType::pluck('type', 'id')),
                Tables\Filters\SelectFilter::make('llg_id')
                    ->label('LLG')
                    ->options(Llg::pluck('name', 'id')),
                Tables\Filters\SelectFilter::make('ward_id')
                    ->label('Ward')
                    ->options(Ward::pluck('name', 'id')),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'planned' => 'Planned',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'delayed' => 'Delayed',
                        'cancelled' => 'Cancelled',
                    ]),
                Tables\Filters\TernaryFilter::make('approved'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->visible(fn () => auth()->user()?->can('view projects')),
                Tables\Actions\EditAction::make()
                    ->visible(fn () => auth()->user()?->can('edit projects')),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn () => auth()->user()?->can('delete projects')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()?->can('delete projects')),
                ]),
            ])
            ->defaultSort('start_date', 'desc');
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
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'primary';
    }
}

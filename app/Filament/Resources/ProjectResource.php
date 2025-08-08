<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
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
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\MultiSelectFilter;


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
        /** @var User|null $user */
        $user = Auth::user();
        return $user && $user->hasAnyRole(['admin', 'project-officer']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                    ->columns(4)
                    ->schema([
                        TextInput::make('project_code')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50)
                            ->columnSpan(1),

                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        Select::make('project_type_id')
                            ->label('Project Type')
                            ->required()
                            ->relationship('type', 'type')
                            ->searchable()
                            ->preload()
                            ->columnSpan(1),

                        Select::make('funding_source_id')
                            ->label('Funding Source')
                            ->required()
                            ->relationship('fundingSource', 'funding_source')
                            ->searchable()
                            ->preload()
                            ->columnSpan(1),
                    ]),

                Section::make('Location Details')
                    ->columns(4)
                    ->schema([
                        Select::make('llg_id')
                            ->label('LLG')
                            ->required()
                            ->relationship('llg', 'name')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(fn (Set $set) => $set('ward_id', null))
                            ->columnSpan(1),

                        Select::make('ward_id')
                            ->label('Ward')
                            ->required()
                            ->options(fn (Get $get): Collection => \App\Models\Ward::query()
                                ->where('llg_id', $get('llg_id'))
                                ->orderBy('name')
                                ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->disabled(fn (Get $get) => !$get('llg_id'))
                            ->columnSpan(1),

                        TextInput::make('location')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),

                        TextInput::make('coordinates')
                            ->maxLength(255)
                            ->placeholder('e.g., -6.7156, 146.9987')
                            ->columnSpan(1),
                    ]),

                Section::make('Financial Information')
                    ->columns(3)
                    ->schema([
                        TextInput::make('budget')
                            ->required()
                            ->numeric()
                            ->prefix('PGK')
                            ->columnSpan(1),

                        TextInput::make('amount_spent')
                            ->numeric()
                            ->prefix('PGK')
                            ->columnSpan(1),

                        TextInput::make('progress_percentage')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('%')
                            ->columnSpan(1),
                    ]),

                Section::make('Timeline')
                    ->columns(3)
                    ->schema([
                        DatePicker::make('start_date')
                            ->required()
                            ->columnSpan(1),

                        DatePicker::make('expected_end_date')
                            ->required()
                            ->columnSpan(1),

                        DatePicker::make('actual_end_date')
                            ->columnSpan(1),
                    ]),

                Section::make('Status & Visibility')
                    ->columns(3)
                    ->schema([
                        Select::make('status')
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

                        Toggle::make('is_public')
                            ->label('Publicly Visible')
                            ->onIcon('heroicon-o-eye')
                            ->offIcon('heroicon-o-eye-slash')
                            ->columnSpan(1),

                        DateTimePicker::make('published_at')
                            ->columnSpan(1),
                    ]),

                Section::make('Description & Media')
                    ->schema([
                        RichEditor::make('description')
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ]),

                        FileUpload::make('featured_image')
                            ->image()
                            ->directory('projects/featured-images')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ]),
/*
                        OptimizedFileUpload::make('featured_image')
                        ->label('Featured Image')
                        ->directory('projects')
                        ->image()
                        ->required(),
                        ]),
*/
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
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->tooltip(fn (Project $record) => $record->title)
                    ->toggleable(),

                TextColumn::make('type.type')
                    ->label('Type')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('ward.name')
                    ->label('Ward')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('llg.name')
                    ->label('LLG')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('budget')
                    ->money('PGK')
                    ->sortable()
                    ->summarize(Sum::make()->money('PGK'))
                    ->toggleable(),

                TextColumn::make('progress_percentage')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable()
                    ->color(fn (string $state): string => match (true) {
                        $state >= 80 => 'success',
                        $state >= 50 => 'warning',
                        default => 'danger',
                    })
                    ->toggleable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'in_progress' => 'primary',
                        'delayed' => 'warning',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->sortable()
                    ->toggleable(),

                IconColumn::make('is_public')
                    ->label('Public')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-eye-slash')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('start_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('createdBy.name')
                    ->label('Created By')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updatedBy.name')
                    ->label('Last Updated By')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('project_type_id')
                    ->label('Project Type')
                    ->relationship('type', 'type')
                    ->searchable()
                    ->multiple()
                    ->preload(),

                SelectFilter::make('llg_id')
                    ->label('LLG')
                    ->relationship('llg', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),

                SelectFilter::make('ward_id')
                    ->label('Ward')
                    ->relationship('ward', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),

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
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\Action::make('addUpdate')
                    ->label('Add Update')
                    ->icon('heroicon-o-document-plus')
                    ->url(function (Project $record) {

                    }),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                        ->before(function (Project $record) {
                            // Delete related updates if needed
                            $record->updates()->delete();
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Collection $records) {
                            $records->each(function (Project $record) {
                                $record->updates()->delete();
                            });
                        }),
                ]),
            ])
            ->defaultSort('start_date', 'desc')
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->persistColumnSearchesInSession();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['type', 'ward', 'llg', 'createdBy', 'updatedBy']);
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\ProjectResource\RelationManagers\ProjectUpdatesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            //'create' => Pages\CreateProject::route('/create'),
            //'edit' => Pages\EditProject::route('/{record}/edit'),
            //'create' => CreateProjectUpdate::route('/create'),
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

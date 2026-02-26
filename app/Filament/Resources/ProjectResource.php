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
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;

use App\Models\NewsUpdate;
use App\Models\NewsUpdateCategory;
use Illuminate\Support\Str;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Facades\Storage;

use Filament\Infolists\Components\Section as InfolistSection;



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
                            ->required()
                            ->live()
                            ->columnSpan(1),

                        Select::make('fundingSources')
                            ->label('Funding Sources')
                            // ->relationship('fundingSources', 'funding_source')
                            ->options(\App\Models\FundingSource::pluck('funding_source', 'id'))
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->required()
                            // ->dehydrated(false)
                            ->columnSpan(1),

                    ]),

                // Section A: Primary Location (NON-ROAD projects)

                Section::make('Location Details')
                    ->columns(4)
                    ->visible(fn (Get $get) => 
                        \App\Models\ProjectType::find($get('project_type_id'))?->code !== 'ROAD'
                    )
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
                            ->required(fn (Get $get) =>
                                \App\Models\ProjectType::find($get('project_type_id'))?->code !== 'ROAD'
                            )   
                            ->options(fn (Get $get): Collection =>
                                \App\Models\Ward::query()
                                    ->where('llg_id', $get('llg_id'))
                                    ->orderBy('name')
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->disabled(fn (Get $get) => ! $get('llg_id'))
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

                    // Section B: 2 point/Location (ROAD projects)

                    Section::make('Road Coverage Details')
                    ->columns(2)
                    ->visible(fn (Get $get) =>
                        \App\Models\ProjectType::find($get('project_type_id'))?->code === 'ROAD'
                    )
                    ->schema([
                        // Select::make('llgs')
                        //     ->label('LLGs Covered')
                        //     ->relationship('llgs', 'name')
                        //     ->multiple()
                        //     ->required(),
                        Select::make('llgs')
                            ->label('LLGs Covered')
                            ->multiple()
                            ->options(\App\Models\Llg::pluck('name', 'id'))
                            ->required(),
                            // ->dehydrated(false),

                        Select::make('wards')
                            ->label('Wards Covered')
                            ->relationship('wards', 'name')
                            ->multiple()
                            ->required(),

                        TextInput::make('location')
                            ->label('Road Section (From – To)')
                            ->placeholder('e.g. Wabag → Laiagam')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('start_coordinates')
                            ->label('Start Coordinates')
                            ->placeholder('-6.1000, 143.6500')
                            ->helperText('Latitude, Longitude')
                            ->required()
                            ->columnSpan(1),

                        TextInput::make('end_coordinates')
                            ->label('End Coordinates')
                            ->placeholder('-6.3500, 143.9200')
                            ->helperText('Latitude, Longitude')
                            ->required()
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
                            ->label('Featured Image')
                            ->disk('public')
                            ->directory('projects/featured-images')
                            ->visibility('public')
                            ->image()
                            ->image()
                            ->maxSize(5120) // 5MB
                            ->imagePreviewHeight('250')
                            ->previewable()
                            ->openable()
                            ->downloadable()
                            ->imageEditor()
                            ->maxSize(4096) // 4MB (IMPORTANT)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->required(fn (string $operation): bool => $operation === 'create')
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
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

            /* =========================
            | PROJECT OVERVIEW
            ========================= */
            InfolistSection::make('Project Overview')
                ->schema([
                    TextEntry::make('project_code')->label('Project Code'),
                    TextEntry::make('title')
                        ->weight('bold')
                        ->size(TextEntry\TextEntrySize::Large),

                    TextEntry::make('type.type')
                        ->label('Project Type')
                        ->badge(),

                    TextEntry::make('status')->badge(),
                    TextEntry::make('progress_percentage')->suffix('%'),
                ])
                ->columns(3),

            /* =========================
            | NON-ROAD LOCATION
            ========================= */
            InfolistSection::make('Location Details')
                ->visible(fn ($record) => $record->type?->code !== 'ROAD')
                ->schema([
                    TextEntry::make('llg.name')->label('LLG'),
                    TextEntry::make('ward.name')->label('Ward'),
                    TextEntry::make('location'),
                    TextEntry::make('coordinates'),
                ])
                ->columns(2),

            /* =========================
            | ROAD COVERAGE
            ========================= */
            InfolistSection::make('Road Coverage')
                ->visible(fn ($record) => $record->type?->code === 'ROAD')
                ->schema([
                    TextEntry::make('llgs')
                        ->label('LLGs Covered')
                        ->getStateUsing(fn ($record) =>
                            $record->llgs->pluck('name')->join(', ')
                        ),

                    TextEntry::make('wards')
                        ->label('Wards Covered')
                        ->getStateUsing(fn ($record) =>
                            $record->wards->pluck('name')->join(', ')
                        ),

                    TextEntry::make('location')
                        ->label('Road Section'),

                    // TextEntry::make('coordinates')
                    //     ->label('Approximate Corridor'),
                    TextEntry::make('start_coordinates')
                        ->label('Start Point'),

                    TextEntry::make('end_coordinates')
                        ->label('End Point'),

                ])
                ->columns(2),

            /* =========================
            | FINANCIAL INFORMATION
            ========================= */
            InfolistSection::make('Financial Information')
                ->schema([
                    TextEntry::make('budget')->money('PGK'),
                    TextEntry::make('amount_spent')->money('PGK'),
                ])
                ->columns(2),

            /* =========================
            | TIMELINE
            ========================= */
            InfolistSection::make('Timeline')
                ->schema([
                    TextEntry::make('start_date')->date(),
                    TextEntry::make('expected_end_date')->date(),
                    TextEntry::make('actual_end_date')->date(),
                ])
                ->columns(3),

            /* =========================
            | DESCRIPTION
            ========================= */
            InfolistSection::make('Project Description')
                ->schema([
                    TextEntry::make('description')
                        ->html()
                        ->columnSpanFull(),
                ]),

            /* =========================
            | FEATURED IMAGE
            ========================= */
            InfolistSection::make('Featured Image')
                ->schema([
                    ImageEntry::make('featured_image')
                        ->getStateUsing(fn ($record) =>
                            $record->featured_image
                                ? asset('storage/' . $record->featured_image)
                                : null
                        )
                        ->height(300)
                        ->extraImgAttributes([
                            'class' => 'rounded-xl shadow-md object-cover',
                        ])
                        ->hiddenLabel(),
                ]),

            /* =========================
            | AUDIT
            ========================= */
            InfolistSection::make('Audit Information')
                ->schema([
                    TextEntry::make('createdBy.name')->label('Created By'),
                    TextEntry::make('updatedBy.name')->label('Last Updated By'),
                    TextEntry::make('created_at')->dateTime(),
                    TextEntry::make('updated_at')->dateTime(),
                ])
                ->columns(2),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view'   => Pages\ViewProject::route('/{record}'),
            'edit'   => Pages\EditProject::route('/{record}/edit'),
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

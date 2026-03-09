<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectorPageResource\Pages;
use App\Filament\Resources\SectorPageResource\RelationManagers;
use App\Models\SectorPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Str;
use Filament\Resources\Pages\ViewRecord;


class SectorPageResource extends Resource
{
    protected static ?string $model = SectorPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sectoral Profile';
     protected static ?string $modelLabel = 'Sector Page';
    protected static ?string $navigationLabel = 'Sector Pages';
    protected static ?int $navigationSort = 9;
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Page Details')
                            ->description('Configure basic information for this sector page')
                            ->icon('heroicon-o-document-text')
                            ->collapsible()
                            ->collapsed(false)
                    ->extraAttributes([
                                'class' => 'bg-emerald-50/40 shadow-xl rounded-2xl border border-emerald-100',
                            ])

                    ->schema([
                        Select::make('sector_id')
                            ->relationship('sector', 'name')
                            ->native(false)
                            ->required(),

                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true) // update slug only when user leaves field
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->extraAttributes([
                                'class' => 'focus:ring-wabag-green focus:border-wabag-green',
                            ]),

                        TextInput::make('slug')
                            ->required()
                            ->disabled() // not editable
                            ->dehydrated() // still save to DB
                            ->unique(ignoreRecord: true)
                            ->helperText('Automatically generated from sector page name.'),

                        Toggle::make('is_published')
                            ->default(false),

                        DateTimePicker::make('published_at'),
                    ])
                    ->columns(2),

                Section::make('Canvas Builder')
                            ->description('Build dynamic content blocks for this page')
                            ->icon('heroicon-o-squares-2x2')
                    ->extraAttributes([
                                'class' => 'bg-gradient-to-r from-slate-100 via-slate-50 to-emerald-100 shadow-xl rounded-2xl border border-slate-200 text-slate-900',
                            ])

                    ->schema([
                        Repeater::make('blocks')
                            ->relationship()
                            ->orderColumn('position')
                            ->label('Page Blocks')
                            ->collapsible()
                            ->cloneable()
                            ->reorderable()
                            ->itemLabel(fn (array $state): ?string => $state['type'] ?? 'Block')
                            ->extraItemActions([
                                \Filament\Forms\Components\Actions\Action::make('divider')
                                    ->label('Add Divider')
                                    ->icon('heroicon-o-minus')
                            ])
                            ->extraAttributes([
                                'class' => 'bg-gradient-to-r from-slate-100 via-slate-50 to-emerald-100 p-6 rounded-2xl border border-slate-200 text-slate-900',
                            ])

                            ->schema([
                            Grid::make(2)
                                ->schema([
                                    Select::make('type')
                                        ->options([
                                            'heading'     => 'Heading',
                                            'paragraph'   => 'Paragraph',
                                            'stats_grid'  => 'Stats Grid',
                                            'table'       => 'Table',
                                            'note'        => 'Note Box',
                                            'divider'     => 'Divider',
                                        ])
                                        ->required()
                                        ->live(),
                                    TextInput::make('content.heading')
                                        ->label('Heading Text')
                                        ->required()
                                        ->extraAttributes([
                                            'class' => 'focus:ring-wabag-green focus:border-wabag-green',
                                        ])
                                        ->visible(fn (Get $get) => $get('type') === 'heading'),
                                    Toggle::make('is_visible')
                                        ->label('Publish Block')
                                        ->default(true)
                                        ->visible(fn (Get $get) => $get('type') !== 'heading'),
                                ]),

                                // ===== HEADING =====
                                Toggle::make('is_visible')
                                    ->label('Publish Block')
                                    ->default(true)
                                    ->visible(fn (Get $get) => $get('type') === 'heading'),
                                Grid::make(3)
                                    ->visible(fn (Get $get) => $get('type') === 'heading')
                                    ->schema([
                                        Select::make('content.heading_style')
                                            ->label('Heading Style')
                                            ->options([
                                                'default' => 'Default (Sans)',
                                                'serif' => 'Serif',
                                                'mono' => 'Mono',
                                            ])
                                            ->default('default')
                                            ->native(false),
                                        Select::make('content.heading_size')
                                            ->label('Heading Size')
                                            ->options([
                                                'text-xl' => 'Small',
                                                'text-2xl' => 'Medium',
                                                'text-3xl' => 'Large',
                                                'text-4xl' => 'Extra Large',
                                            ])
                                            ->default('text-2xl')
                                            ->native(false),
                                        Select::make('content.heading_color')
                                            ->label('Heading Color')
                                            ->options([
                                                'text-wabag-green' => 'Wabag Green',
                                                'text-gray-900' => 'Charcoal',
                                                'text-blue-700' => 'Blue',
                                                'text-emerald-700' => 'Emerald',
                                                'text-amber-700' => 'Amber',
                                                'text-rose-700' => 'Rose',
                                            ])
                                            ->default('text-wabag-green')
                                            ->native(false),
                                    ]),

                                // ===== PARAGRAPH =====
                                // RichEditor::make('content.paragraph')
                                //     ->label('Paragraph Content')
                                //     ->visible(fn (Get $get) => $get('type') === 'paragraph'),
                                RichEditor::make('content.paragraph')
                                    ->label('Paragraph Content')
                                    ->visible(fn (Get $get) => $get('type') === 'paragraph')
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'strike',
                                        'h2',
                                        'h3',
                                        'bulletList',
                                        'orderedList',
                                        'blockquote',
                                        'link',
                                        'undo',
                                        'redo',
                                    ])
                                    ->columnSpanFull(),

                                // ===== NOTE =====
                                RichEditor::make('content.note')
                                    ->label('Note Content')
                                    ->visible(fn (Get $get) => $get('type') === 'note'),

                                // ===== STATS GRID =====
                                Repeater::make('content.stats')
                                    ->visible(fn (Get $get) => $get('type') === 'stats_grid')
                                    ->label('Stats Items')
                                    ->reorderable()
                                    ->defaultItems(1)
                                    ->schema([


                                        Grid::make(4)
                                            ->schema([

                                                TextInput::make('title')
                                                    ->required()
                                                    ->columnSpan(2),

                                                TextInput::make('value')
                                                    ->numeric()
                                                    ->required()
                                                    ->columnSpan(1),

                                                Select::make('unit')
                                                    ->label('Unit Type')
                                                    ->options([
                                                        '%'        => 'Percentage (%)',
                                                        'PGK'      => 'Currency (PGK)',
                                                        '$'        => 'Currency ($)',
                                                        'km'       => 'Distance (Km)',
                                                        'm'        => 'Distance (Meters)',
                                                        'count'    => 'Count',
                                                        'ratio'    => 'Ratio (1:1)',
                                                        'custom'   => 'Custom',
                                                    ])
                                                    ->default('%')
                                                    ->required()
                                                    ->columnSpan(1),
                                            ]),

                                        TextInput::make('unit_custom')
                                            ->label('Custom Unit')
                                            ->visible(fn (Get $get) => $get('unit') === 'custom'),

                                        TextInput::make('description')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(1),


                                        Grid::make(4)
                                            ->schema([

                                                TextInput::make('title')
                                                    ->label('Stat Title')
                                                    ->required()
                                                    ->columnSpan(2),

                                                TextInput::make('value')
                                                    ->label('Value')
                                                    ->helperText('Can be numeric (81, 15, 350) or text (Moderate, Frequent)')
                                                    ->columnSpan(1),

                                                Select::make('unit')
                                                    ->label('Unit Type')
                                                    ->options([
                                                        '%'        => 'Percentage (%)',
                                                        'PGK'      => 'Currency (PGK)',
                                                        '$'        => 'Currency ($)',
                                                        'km'       => 'Distance (Km)',
                                                        'm'        => 'Distance (Meters)',
                                                        'count'    => 'Count',
                                                        'ratio'    => 'Ratio (1:1)',
                                                        '+'        => 'Plus (+)',
                                                        'custom'   => 'Custom',
                                                    ])
                                                    ->placeholder('No Unit')
                                                    ->reactive()
                                                    ->columnSpan(1),
                                            ]),

                                        TextInput::make('unit_custom')
                                            ->label('Custom Unit')
                                            ->visible(fn (Get $get) => $get('unit') === 'custom')
                                            ->columnSpanFull(),

                                        TextInput::make('description')
                                            ->label('Short Description')
                                            ->columnSpanFull(),
                                    ]),

                                // ===== TABLE BUILDER (MS Word Style) =====

                            // =====================
                            // MS WORD STYLE TABLE
                            // =====================

                            Grid::make(2)
                                ->visible(fn (Get $get) => $get('type') === 'table')
                                ->schema([
                                    TextInput::make('label')
                                        ->label('Block Label')
                                        ->placeholder('Table title (optional)')
                                        ->columnSpanFull()
                                        ->visible(fn (Get $get) => $get('type') === 'table'),

                                    TextInput::make('content.rows')
                                        ->label('Number of Rows')
                                        ->numeric()
                                        ->minValue(1)
                                        ->live()
                                        ->afterStateUpdated(function (Set $set, Get $get) {
                                            self::buildTable($set, $get);
                                        }),

                                    TextInput::make('content.columns')
                                        ->label('Number of Columns')
                                        ->numeric()
                                        ->minValue(1)
                                        ->live()
                                        ->afterStateUpdated(function (Set $set, Get $get) {
                                            self::buildTable($set, $get);
                                        }),
                                ]),

                            Repeater::make('content.table')
                                ->visible(fn (Get $get) => $get('type') === 'table')
                                ->label('Table Grid')
                                ->reorderable(false)
                                ->addable(false)
                                ->deletable(false)
                                ->schema(function (Get $get) {

                                    $columns = (int) ($get('content.columns') ?? 1);
                                    $fields = [];

                                    for ($i = 0; $i < $columns; $i++) {

                                        $fields[] = TextInput::make("col_$i")
                                            ->label('')
                                            ->placeholder(function (Get $get) {
                                                $rowIndex = $get('../../__index');

                                                return $rowIndex === 0
                                                    ? 'Header Column'
                                                    : 'Cell';
                                            })
                                            ->extraAttributes(function (Get $get) use ($i) {

                                                $rowIndex = $get('../../__index');

                                                return [
                                                    'class' => $rowIndex === 0
                                                        ? 'bg-wabag-green/10 font-semibold text-wabag-green border-wabag-green focus:ring-wabag-green'
                                                        : 'bg-white text-gray-800 focus:ring-wabag-green',
                                                    'style' => 'min-width: 80px;',
                                                ];
                                            })
                                            ->columnSpan(1);
                                    }

                                    return $fields;
                                })
                                ->columns(12), // visual layout grid
                            ]),
                    ]),
                    // ===============================
                    // SIDEBAR CONFIGURATION SECTION
                    // ===============================

                    Section::make('Sidebar Configuration')
                        ->description('Manage sidebar stats and resources')
                        ->icon('heroicon-o-rectangle-stack')
                        ->extraAttributes([
                            'class' => 'bg-amber-50/40 shadow-xl rounded-2xl border border-amber-100',
                        ])
                        ->schema([

                            // Sidebar Stats
                            Repeater::make('sidebar_stats')
                                ->label('Key Stats')
                                ->schema([
                                    Grid::make(3)->schema([
                                        TextInput::make('label')
                                            ->columnSpan(2),

                                        TextInput::make('value')
                                            ->columnSpan(1),
                                    ]),
                                ])
                                ->addActionLabel('Add Stat'),

                            // Sidebar Resources
                            Repeater::make('sidebar_resources')
                                ->label('Resources')
                                ->schema([
                                    TextInput::make('title')
                                        ->label('Resource Title'),

                                    TextInput::make('url')
                                        ->label('Link URL'),
                                ])
                                ->addActionLabel('Add Resource'),
                        ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('sector.name')
                    ->label('Sector')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                // TextColumn::make('slug')
                //     ->copyable()
                //     ->color('gray')
                //     ->limit(30),

                TextColumn::make('is_published')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'Published' : 'Draft')
                    ->color(fn ($state) => $state ? 'success' : 'warning'),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since()
                    ->toggleable(),

            ])
            ->filters([
                SelectFilter::make('is_published')
                    ->options([
                        1 => 'Published',
                        0 => 'Draft',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorPages::route('/'),
            'create' => Pages\CreateSectorPage::route('/create'),
            'view'   => Pages\ViewSectorPage::route('/{record}'),
            'edit' => Pages\EditSectorPage::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'primary';
    }

    protected static function buildTable(Set $set, Get $get): void
    {
        $rows = (int) ($get('content.rows') ?? 0);
        $cols = (int) ($get('content.columns') ?? 0);

        if ($rows < 1 || $cols < 1) {
            return;
        }

        $table = [];

        for ($r = 0; $r < $rows; $r++) {

            $row = [];

            for ($c = 0; $c < $cols; $c++) {
                $row["col_$c"] = '';
            }

            $table[] = $row;
        }

        $set('content.table', $table);
    }

}

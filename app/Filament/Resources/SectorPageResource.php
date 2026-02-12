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
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\Textarea;


class SectorPageResource extends Resource
{
    protected static ?string $model = SectorPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Page Details')
                    ->schema([
                        Select::make('sector_id')
                            ->relationship('sector', 'name')
                            ->required(),

                        TextInput::make('title')
                            ->required(),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Toggle::make('is_published')
                            ->default(false),

                        DateTimePicker::make('published_at'),
                    ])
                    ->columns(2),

                Section::make('Canvas Builder')
                    ->schema([
                        Repeater::make('blocks')
                            ->relationship()
                            ->orderColumn('position')
                            ->label('Page Blocks')
                            ->collapsible()
                            ->cloneable()
                            ->reorderable()
                            ->schema([

                                Select::make('type')
                                    ->options([
                                        'heading'     => 'Heading',
                                        'paragraph'   => 'Paragraph',
                                        'stats_grid'  => 'Stats Grid',
                                        'table'       => 'Table',
                                        'note'        => 'Note Box',
                                    ])
                                    ->required()
                                    ->live(),

                                TextInput::make('label')
                                    ->label('Block Label'),

                                Toggle::make('is_visible')
                                    ->default(true),

                                // ===== HEADING =====
                                TextInput::make('content.heading')
                                    ->label('Heading Text')
                                    ->visible(fn (Get $get) => $get('type') === 'heading'),

                                // ===== PARAGRAPH =====
                                RichEditor::make('content.paragraph')
                                    ->label('Paragraph Content')
                                    ->visible(fn (Get $get) => $get('type') === 'paragraph'),

                                // ===== NOTE =====
                                RichEditor::make('content.note')
                                    ->label('Note Content')
                                    ->visible(fn (Get $get) => $get('type') === 'note'),

                                // ===== STATS GRID =====
                                Repeater::make('content.stats')
                                    ->visible(fn (Get $get) => $get('type') === 'stats_grid')
                                    ->label('Stats Items')
                                    ->reorderable()
                                    ->schema([
                                        TextInput::make('title')->required(),
                                        TextInput::make('value')->required(),
                                        TextInput::make('description'),
                                    ])
                                    ->columns(3),

                                // ===== TABLE =====
                                Textarea::make('content.headers')
                                    ->label('Table Headers (comma separated)')
                                    ->visible(fn (Get $get) => $get('type') === 'table'),

                                Repeater::make('content.rows')
                                    ->visible(fn (Get $get) => $get('type') === 'table')
                                    ->label('Table Rows')
                                    ->reorderable()
                                    ->schema([
                                        TextInput::make('row')
                                            ->placeholder('John, 25, Wabag')
                                    ]),

                            ]),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'edit' => Pages\EditSectorPage::route('/{record}/edit'),
        ];
    }
}

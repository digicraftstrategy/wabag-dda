<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExploreWabagItemResource\Pages;
use App\Models\ExploreWabagItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Illuminate\Support\Facades\Storage;

class ExploreWabagItemResource extends Resource
{
    protected static ?string $model = ExploreWabagItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Home Content';
    protected static ?string $modelLabel = 'Explore Wabag Item';
    protected static ?string $navigationLabel = 'Explore Wabag Items';
    protected static ?int $navigationSort = 2;

    public static function canAccess(): bool
    {
        $user = Auth::user();
        return $user && $user->hasAnyRole(['admin', 'media-officer']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Card Content')
                    ->schema([
                        TextInput::make('category_label')
                            ->label('Category Label')
                            ->maxLength(60)
                            ->placeholder('e.g. CULTURAL HERITAGE'),

                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->unique(ignoreRecord: true)
                            ->helperText('Automatically generated from title.'),

                        Textarea::make('description')
                            ->required()
                            ->rows(4),

                        FileUpload::make('image_path')
                            ->label('Image')
                            ->disk('public')
                            ->directory('explore-wabag')
                            ->visibility('public')
                            ->image()
                            ->deletable()
                            ->previewable()
                            ->openable()
                            ->downloadable(),

                        FileUpload::make('gallery_images')
                            ->label('Gallery Images')
                            ->disk('public')
                            ->directory('explore-wabag/gallery')
                            ->visibility('public')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->deletable()
                            ->previewable()
                            ->openable()
                            ->downloadable(),

                        Select::make('icon')
                            ->label('Icon')
                            ->options([
                                'cultural' => 'Cultural Heritage',
                                'nature' => 'Natural Wonders',
                                'community' => 'Community',
                            ])
                            ->native(false)
                            ->placeholder('Select icon'),

                        TextInput::make('link_label')
                            ->label('Link Label')
                            ->maxLength(60)
                            ->placeholder('e.g. Learn More'),

                        TextInput::make('link_url')
                            ->label('Link URL')
                            ->maxLength(255)
                            ->placeholder('e.g. /culture'),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ])
                    ->columns(2),
                Section::make('Detailed Content')
                    ->schema([
                        Forms\Components\RichEditor::make('detail_intro')
                            ->label('Detail Intro'),

                        Repeater::make('highlights')
                            ->label('Highlights')
                            ->schema([
                                TextInput::make('value')
                                    ->label('Highlight')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->collapsed(),

                        Repeater::make('tips')
                            ->label('Visitor Tips')
                            ->schema([
                                TextInput::make('value')
                                    ->label('Tip')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->collapsed(),

                        Repeater::make('checklist')
                            ->label('Checklist')
                            ->schema([
                                TextInput::make('value')
                                    ->label('Item')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->collapsed(),

                        Repeater::make('itinerary')
                            ->label('Suggested Itinerary')
                            ->schema([
                                TextInput::make('value')
                                    ->label('Step')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->collapsed(),

                        Repeater::make('locations')
                            ->label('Locations or Stops')
                            ->schema([
                                TextInput::make('value')
                                    ->label('Location')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->collapsed(),

                        TextInput::make('best_time')
                            ->label('Best Time to Visit')
                            ->maxLength(255),

                        TextInput::make('duration')
                            ->label('Typical Duration')
                            ->maxLength(255),

                        TextInput::make('difficulty')
                            ->label('Difficulty or Accessibility')
                            ->maxLength(255),

                        TextInput::make('opening_hours')
                            ->label('Opening Hours')
                            ->maxLength(255),

                        TextInput::make('price_info')
                            ->label('Price Info')
                            ->maxLength(255),

                        Textarea::make('getting_there')
                            ->label('Getting There')
                            ->rows(3),

                        Textarea::make('safety_notes')
                            ->label('Safety Notes')
                            ->rows(3),

                        Textarea::make('contact_info')
                            ->label('Contact Info')
                            ->rows(3),
                        TextInput::make('latitude')
                            ->label('Latitude')
                            ->numeric()
                            ->step('0.0000001'),
                        TextInput::make('longitude')
                            ->label('Longitude')
                            ->numeric()
                            ->step('0.0000001'),
                        TextInput::make('map_embed_url')
                            ->label('Map Embed URL (iframe src)')
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Image')
                    ->getStateUsing(fn ($record) => $record->image_path ? asset('storage/' . $record->image_path) : null)
                    ->circular(),

                TextColumn::make('category_label')
                    ->label('Category')
                    ->limit(24),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->limit(32),

                TextColumn::make('sort_order')
                    ->sortable(),

                ToggleColumn::make('is_published')
                    ->label('Published'),
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
            ->defaultSort('sort_order');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make('Item Details')
                    ->schema([
                        ImageEntry::make('image_path')
                            ->label('Image')
                            ->getStateUsing(fn ($record) => $record->image_path ? asset('storage/' . $record->image_path) : null),
                        ImageEntry::make('gallery_images')
                            ->label('Gallery Images')
                            ->getStateUsing(fn ($record) => collect($record->gallery_images ?? [])->map(fn ($path) => asset('storage/' . $path))->all()),
                        TextEntry::make('category_label')->label('Category'),
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('description')->columnSpanFull(),
                        TextEntry::make('detail_intro')->label('Detail Intro')->columnSpanFull(),
                        TextEntry::make('link_label')->label('Link Label'),
                        TextEntry::make('link_url')->label('Link URL'),
                        TextEntry::make('is_published')->label('Published'),
                    ])->columns(2),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExploreWabagItems::route('/'),
            'create' => Pages\CreateExploreWabagItem::route('/create'),
            'edit' => Pages\EditExploreWabagItem::route('/{record}/edit'),
            'view' => Pages\ViewExploreWabagItem::route('/{record}'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\NewsUpdateResource\Pages;
use App\Models\NewsUpdate;
use App\Models\NewsUpdateCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class NewsUpdateResource extends Resource
{
    protected static ?string $model = NewsUpdate::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'News & Update';
    protected static ?string $modelLabel = 'News Update';
    protected static ?string $navigationLabel = 'News Updates';
    protected static ?int $navigationSort = 4;

    public static function canAccess(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();
        return $user && $user->hasAnyRole(['admin', 'media-officer']);
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live()
                            ->afterStateUpdated(function ($state, $set) {
                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\Select::make('newsupdate_category_id')
                            ->label('Category')
                            ->relationship('newsCategory', 'category')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\FileUpload::make('featured_image')
                            ->image()
                            ->directory('news-updates')
                            ->visibility('public')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('news-updates/attachments'),
                    ])->columns(2),

                Section::make('Publishing')
                    ->schema([
                        Forms\Components\DateTimePicker::make('published_date')
                            ->required()
                            ->default(now()),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),

                        Forms\Components\Hidden::make('user_id')
                            ->default(auth()->id())
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        if ($table === null) {
        throw new \InvalidArgumentException('Table object is null');
    }
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->label('Image')
                    ->disk('public')
                    ->circular()
                    ->url(fn ($record) => Storage::disk('public')->url($record->featured_image)),
                    //->getUrl(fn ($record) => storage_path('app/public/' . $record->featured_image)),
                    //->getUrl(fn ($record) => asset('storage/' . $record->featured_image)),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(function ($record) {
                        return strlen($record->title) > 50 ? $record->title : null;
                    }),

                TextColumn::make('newsCategory.category')
                    ->label('Category')
                    ->badge()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('published_date')
                    ->dateTime()
                    ->sortable(),

                ToggleColumn::make('is_published')
                    ->label('Published'),

                TextColumn::make('user.name')
                    ->label('Author')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('newsupdate_category_id')
                    ->label('Category')
                    ->relationship('newsCategory', 'category')
                    ->searchable()
                    ->preload(),

                Tables\Filters\Filter::make('published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true))
                    ->label('Only Published'),

                Tables\Filters\Filter::make('unpublished')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', false))
                    ->label('Only Unpublished'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('view news');
                    }),
                Tables\Actions\EditAction::make()
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('edit news');
                    }),
                Tables\Actions\DeleteAction::make()
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('delete news');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_date', 'desc')
            ->modifyQueryUsing(function (Builder $query) {
                $query->with(['newsCategory', 'user']);
            });
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsUpdates::route('/'),
            'create' => Pages\CreateNewsUpdate::route('/create'),
            'edit' => Pages\EditNewsUpdate::route('/{record}/edit'),
        ];
    }
}

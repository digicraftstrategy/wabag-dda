<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExploreWabagSectionResource\Pages;
use App\Models\ExploreWabagSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Facades\Auth;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;

class ExploreWabagSectionResource extends Resource
{
    protected static ?string $model = ExploreWabagSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Home Content';
    protected static ?string $modelLabel = 'Explore Wabag Section';
    protected static ?string $navigationLabel = 'Explore Wabag Section';
    protected static ?int $navigationSort = 1;

    public static function canAccess(): bool
    {
        $user = Auth::user();
        return $user && $user->hasAnyRole(['admin', 'media-officer']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Section Content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('subtitle')
                            ->rows(3)
                            ->maxLength(500),

                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subtitle')
                    ->limit(60),

                ToggleColumn::make('is_published')
                    ->label('Published'),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('updated_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExploreWabagSections::route('/'),
            'create' => Pages\CreateExploreWabagSection::route('/create'),
            'edit' => Pages\EditExploreWabagSection::route('/{record}/edit'),
            'view' => Pages\ViewExploreWabagSection::route('/{record}'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make('Section Details')
                    ->schema([
                        TextEntry::make('title'),
                        TextEntry::make('subtitle')->columnSpanFull(),
                        TextEntry::make('is_published')->label('Published'),
                    ])->columns(2),
            ]);
    }
}

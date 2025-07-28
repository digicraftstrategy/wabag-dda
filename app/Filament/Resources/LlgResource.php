<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LlgResource\Pages\ViewLlg;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\LlgResource\Pages;
use App\Models\Llg;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class LlgResource extends Resource
{
    protected static ?string $model = Llg::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $modelLabel = 'LLGs';

    protected static ?string $navigationLabel = 'LLGs';
    protected static ?string $navigationGroup = 'System Variables';
    protected static ?int $navigationSort = 7;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::$model::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning'; // Options: primary, success, warning, danger, info, etc.
    }

    public static function canAccess(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();
        return $user && $user->hasAnyRole(['admin', 'media-officer', 'project-officer']);
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('LLG Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('LLG Name'),

                        Forms\Components\TextInput::make('code')
                            ->required()
                            ->maxLength(50)
                            ->label('LLG Code')
                            ->unique(ignoreRecord: true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->searchable()
                    ->sortable()
                    ->label('Code')
                    ->badge()
                    ->colors(['warning']),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('LLG Name'),

                TextColumn::make('wards_count')
                    ->counts('wards')
                    ->label('Wards')
                    ->sortable()
                    ->badge()
                    ->colors(['success']),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('view llgs');
                    }),
                Tables\Actions\EditAction::make()
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('edit llgs');
                    }),
                Tables\Actions\DeleteAction::make()
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('delete llgs');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->visible(function () {
                    /** @var \App\Models\User|null $user */
                    $user = Auth::user();
                    return $user && $user->can('delete llgs');
                    }),
                ])
            ])
            ->defaultSort('code', 'asc')
            ->modifyQueryUsing(function (Builder $query) {
                $query->withCount('wards');
            });
    }

    public static function getRelations(): array
    {
        return [
            // Relation managers can be added here if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLlgs::route('/'),
            'create' => Pages\CreateLlg::route('/create'),
            'edit' => Pages\EditLlg::route('/{record}/edit'),
            'view' => ViewLlg::route('/{record}'), //Added this manually created view route
        ];
    }
}

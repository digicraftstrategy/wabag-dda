<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\FundingSourceResource\Pages;
use App\Filament\Resources\FundingSourceResource\RelationManagers;
use App\Models\FundingSource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FundingSourceResource extends Resource
{
    protected static ?string $model = FundingSource::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Project Management';
    protected static ?string $modelLabel = 'Funding Source';
    protected static ?string $navigationLabel = 'Funding Sources';
    protected static ?int $navigationSort = 3;

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
                        Forms\Components\TextInput::make('funding_source')
                            ->label('Funding Source Name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('code')
                            ->label('Source Code')
                            ->required()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('fiscal_year')
                            ->label('Fiscal Year')
                            ->required()
                            ->maxLength(10),
                    ])->columns(3),

                Forms\Components\Section::make('Details')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->columnSpanFull(),
                        Forms\Components\Select::make('type')
                            ->label('Funding Type')
                            ->options([
                                'government' => 'Government',
                                'donor' => 'Donor',
                                'private' => 'Private',
                                'community' => 'Community',
                                'other' => 'Other',
                            ])
                            ->required(),
                        Forms\Components\Select::make('government_level')
                            ->label('Government Level')
                            ->options([
                                'national' => 'National',
                                'regional' => 'Provincial',
                                'county' => 'District',
                                'other' => 'Other',
                            ])
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('recurring')
                            ->label('Recurring Funding?')
                            ->required()
                            ->inline(false),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active Status')
                            ->required()
                            ->inline(false)
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Code')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('funding_source')
                    ->label('Funding Source')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'federal' => 'primary',
                        'state' => 'success',
                        'local' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('government_level')
                    ->label('Level')
                    ->sortable(),
                Tables\Columns\IconColumn::make('recurring')
                    ->label('Recurring')
                    ->boolean(),
                Tables\Columns\TextColumn::make('fiscal_year')
                    ->label('Fiscal Year')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'federal' => 'Federal',
                        'state' => 'State',
                        'local' => 'Local',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->default(true),
            ])
            ->actions([
                /*Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil-square'),
                Tables\Actions\ViewAction::make()
                    ->icon('heroicon-o-eye'),*/
                    Tables\Actions\ViewAction::make()
                    ->icon('heroicon-o-eye')
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('view fundings');
                    }),
                Tables\Actions\EditAction::make()
                ->icon('heroicon-o-pencil-square')
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('edit fundings');
                    }),
                Tables\Actions\DeleteAction::make()
                ->visible(function () {
                        /** @var User|null $user */
                        $user = Auth::user();
                        return $user && $user->can('delete fundings');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->icon('heroicon-o-trash')
                        ->visible(function () {
                    /** @var \App\Models\User|null $user */
                    $user = Auth::user();
                    return $user && $user->can('delete fundings');
                    }),
                ])
            ])
            ->defaultSort('code', 'asc');
    }

    public static function getRelations(): array
    {
        return [
            //RelationManagers\ProjectsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFundingSources::route('/'),
            'create' => Pages\CreateFundingSource::route('/create'),
            'edit' => Pages\EditFundingSource::route('/{record}/edit'),
            //'view' => Pages\ViewFundingSource::route('/{record}'),
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
}

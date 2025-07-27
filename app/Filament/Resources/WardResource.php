<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\WardResource\Pages;
use App\Models\Ward;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class WardResource extends Resource
{
    protected static ?string $model = Ward::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationLabel = 'Wards';
    protected static ?string $navigationGroup = 'System Variables';

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
                Section::make('Ward Information')
                    ->schema([
                        Forms\Components\TextInput::make('ward_number')
                            ->required()
                            ->numeric()
                            ->label('Ward Number'),

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Ward Name'),

                        Select::make('llg_id')
                            ->relationship('llg', 'name')
                            ->label('LLG')
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ward_number')
                    ->searchable()
                    ->sortable()
                    ->label('Ward Number'),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Ward Name'),

                TextColumn::make('llg.name')
                    ->searchable()
                    ->sortable()
                    ->label('LLG')
                    ->badge(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('llg_id')
                    ->label('Filter by LLG')
                    ->relationship('llg', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('ward_number', 'asc')
            ->modifyQueryUsing(function (Builder $query) {
                $query->with(['llg']);
            });
    }

    public static function getRelations(): array
    {
        return [
            // Add relation managers if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWards::route('/'),
            'create' => Pages\CreateWard::route('/create'),
            'edit' => Pages\EditWard::route('/{record}/edit'),
        ];
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }
}

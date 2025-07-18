<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsUpdateCategoryResource\Pages;
use App\Filament\Resources\NewsUpdateCategoryResource\RelationManagers;
use App\Models\NewsUpdateCategory;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Components\Textarea;

class NewsUpdateCategoryResource extends Resource
{
    protected static ?string $model = NewsUpdateCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationGroup = 'News & Update';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('category')->required()
                ->live()
                ->afterStateUpdated(function ($state, $set) {
                    $set('slug', Str::slug($state));
                }),
                TextInput::make('slug'),
                Textarea::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category')->sortable('category')->searchable(),
                Tables\Columns\TextColumn::make('slug')->sortable('slug')->searchable(),
                Tables\Columns\TextColumn::make('description'),
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
            'index' => Pages\ListNewsUpdateCategories::route('/'),
            'create' => Pages\CreateNewsUpdateCategory::route('/create'),
            'edit' => Pages\EditNewsUpdateCategory::route('/{record}/edit'),
        ];
    }
}

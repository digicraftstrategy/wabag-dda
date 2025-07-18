<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsUpdateResource\Pages;
use App\Filament\Resources\NewsUpdateResource\RelationManagers;
use App\Models\NewsUpdate;
use App\Models\NewsUpdateCategory;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Dom\Text;
use Faker\Core\File;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Illuminate\Support\Str;

class NewsUpdateResource extends Resource
{
    protected static ?string $model = NewsUpdate::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'News & Update';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()
                ->live()
                ->afterStateUpdated(function ($state, $set) {
                    $set('slug', Str::slug($state));
                }),
                TextInput::make('slug'),
                FileUpload::make('featured_image')->required(),
                Select::make('newsupdate_category_id')
                    ->label('Category')
                     ->options(NewsUpdateCategory::all()->pluck('category', 'id'))
                    ->searchable(),
                RichEditor::make('content')->required(),
                DateTimePicker::make('published_date')->required(),
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
            'index' => Pages\ListNewsUpdates::route('/'),
            'create' => Pages\CreateNewsUpdate::route('/create'),
            'edit' => Pages\EditNewsUpdate::route('/{record}/edit'),
        ];
    }
}

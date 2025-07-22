<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LlgResource\Pages;
use App\Filament\Resources\LlgResource\RelationManagers;
use App\Models\Llg;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LlgResource extends Resource
{
    protected static ?string $model = Llg::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $modelLabel = 'LLGs';
   // protected static ?string $navigationGroup = 'System Variables';
    protected static ?string $navigationLabel = 'LLGs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()
                ->label('LLG'),
                TextColumn::make('code')->searchable()
                ->label('Code'),
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
            'index' => Pages\ListLlgs::route('/'),
            'create' => Pages\CreateLlg::route('/create'),
            'edit' => Pages\EditLlg::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'System Variables';
    }
    public static function getNavigationSort(): ?int
    {
        return 2;
    }
}

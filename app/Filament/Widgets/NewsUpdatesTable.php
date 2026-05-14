<?php

namespace App\Filament\Widgets;

use App\Models\NewsUpdate;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class NewsUpdatesTable extends BaseWidget
{
    protected static ?string $heading = 'Recent News Updates';

    public function getColumnSpan(): string|int|array
    {
        return 'full';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(NewsUpdate::query()->latest())
            ->columns([
                TextColumn::make('title')
                    ->label('News Title')
                    ->searchable()
                    ->limit(80)
                    ->wrap(),

                TextColumn::make('newsCategory.category')
                    ->label('Category')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('created_at')
                    ->label('Published')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([10, 25, 50]);
    }
}

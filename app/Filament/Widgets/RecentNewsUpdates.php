<?php

namespace App\Filament\Widgets;

use App\Models\NewsUpdate;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentNewsUpdates extends BaseWidget
{
    protected static ?int $sort = 6; // Optional: Controls widget order on dashboard

    // Set widget width to full screen (Tailwind class)
    public function getColumnSpan(): string
    {
        return 'full'; // Tailwind max-w-full
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                NewsUpdate::query()->latest()->limit(5)
            )
            ->columns([
                TextColumn::make('title')
                    ->label('News Title')
                    ->searchable()
                    ->limit(50)
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
            ]);
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Jewelry;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;

class LatestProducts extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Jewelry::latest()->limit(5)
            )
            ->heading('Recent Products')
            ->columns([
                ImageColumn::make('image')
                    ->square()
                    ->size(40),
                TextColumn::make('name')
                    ->label('Product')
                    ->searchable()
                    ->weight('medium'),
                TextColumn::make('category.name')
                    ->label('Category'),
                TextColumn::make('price')
                    ->money('IDR')
                    ->label('Price'),
                TextColumn::make('stock')
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        $state <= 10 => 'warning',
                        $state > 100 => 'success',
                        default => 'success'
                    })
            ])
            ->actions([
                Action::make('edit')
                    ->url(fn (Jewelry $record): string => route('filament.admin.resources.jewelries.edit', $record))
                    ->icon('heroicon-m-pencil-square')
            ])
            ->paginated(false)
            ->defaultSort('created_at', 'desc');
    }
} 
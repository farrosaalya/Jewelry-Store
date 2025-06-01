<?php

namespace App\Filament\Widgets;

use App\Models\Jewelry;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalProducts = Jewelry::count();
        $totalCategories = Category::count();
        $lowStock = Jewelry::where('stock', '<=', 10)->where('stock', '>', 0)->count();
        $outOfStock = Jewelry::where('stock', 0)->count();

        return [
            Stat::make('Total Products', $totalProducts)
                ->description('All jewelry items')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary')
                ->chart([7, 3, 4, 5, 6, $totalProducts]),

            Stat::make('Categories', $totalCategories)
                ->description('Product categories')
                ->descriptionIcon('heroicon-m-tag')
                ->color('success')
                ->chart([2, 3, 4, $totalCategories]),

            Stat::make('Low Stock', $lowStock)
                ->description('Products with stock <= 10')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('warning')
                ->chart([1, 2, 1, $lowStock]),

            Stat::make('Out of Stock', $outOfStock)
                ->description('Products with zero stock')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger')
                ->chart([0, 1, 0, $outOfStock]),
        ];
    }
} 
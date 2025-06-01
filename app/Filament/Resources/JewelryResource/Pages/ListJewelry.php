<?php

namespace App\Filament\Resources\JewelryResource\Pages;

use App\Filament\Resources\JewelryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJewelry extends ListRecords
{
    protected static string $resource = JewelryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add Jewelry')
                ->icon('heroicon-m-plus'),
        ];
    }
} 
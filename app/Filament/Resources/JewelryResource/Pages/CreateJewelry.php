<?php

namespace App\Filament\Resources\JewelryResource\Pages;

use App\Filament\Resources\JewelryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJewelry extends CreateRecord
{
    protected static string $resource = JewelryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
} 
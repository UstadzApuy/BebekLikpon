<?php

namespace App\Filament\SuperAdmin\Resources\StokResource\Pages;

use App\Filament\SuperAdmin\Resources\StokResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStoks extends ListRecords
{
    protected static string $resource = StokResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}

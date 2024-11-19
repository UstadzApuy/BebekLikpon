<?php
// app/Filament/Resources/PemesananResource/Pages/ListPemesanans.php

namespace App\Filament\Resources\PemesananResource\Pages;

use App\Filament\Resources\PemesananResource;
use App\Models\Menu;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListPemesanans extends ListRecords
{
    protected static string $resource = PemesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Buat Pesanan')
            ->icon('heroicon-o-shopping-cart'),
        ];
    }
}

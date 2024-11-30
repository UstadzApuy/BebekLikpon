<?php

namespace App\Filament\SuperAdmin\Resources\LaporanSPResource\Pages;

use App\Filament\SuperAdmin\Resources\LaporanSPResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanSP extends EditRecord
{
    protected static string $resource = LaporanSPResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

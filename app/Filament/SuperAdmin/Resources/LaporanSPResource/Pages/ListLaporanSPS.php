<?php

namespace App\Filament\SuperAdmin\Resources\LaporanSPResource\Pages;

use App\Exports\OrdersExport;
use App\Filament\SuperAdmin\Resources\LaporanSPResource;
use App\Models\Pemesanan;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\ActionGroup;
use Maatwebsite\Excel\Facades\Excel;

class ListLaporanSPS extends ListRecords
{
    protected static string $resource = LaporanSPResource::class;

    protected function getActions(): array
    {
        return [
            ActionGroup::make(
                [
                    Action::make('export_pdf')
                    ->label('Export to PDF')
                    ->icon('heroicon-o-printer')
                    ->action(function () {
                        $orders = Pemesanan::with(['user', 'items.menu'])
                            ->where('status', 'completed') // Hanya ambil pesanan dengan status completed
                            ->get();
                        $pdf = Pdf::loadView('exports.orders', ['orders' => $orders]);
                        return response()->streamDownload(
                            fn () => print($pdf->stream()),
                            'completed_orders_report.pdf'
                        );
                    }),
                Action::make('export_excel')
                    ->label('Export to Excel')
                    ->icon('heroicon-o-printer')
                    ->action(function () {
                        return Excel::download(new OrdersExport, 'orders_report.xlsx');
                    }),
            ])
            ->label('Export')
            ->icon('heroicon-o-printer')
            ,
        ];
    }

}

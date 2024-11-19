<?php

namespace App\Filament\SuperAdmin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\PemesananItem;
use Carbon\Carbon;

class DataPenjualan extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        // Mengambil total penjualan per bulan
        $salesData = PemesananItem::whereHas('pemesanan', function ($query) {
            $query->where('status', 'completed')
                  ->whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year);
        })
        ->selectRaw('SUM(total_price) as total_sales, DATE_FORMAT(created_at, "%Y-%m-%d") as date')
        ->groupBy('date')
        ->pluck('total_sales', 'date')
        ->toArray();

        return [
            'labels' => array_keys($salesData),
            'datasets' => [
                [
                    'label' => 'Penjualan Bulan Ini',
                    'data' => array_values($salesData),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

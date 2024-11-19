<?php

namespace App\Exports;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pemesanan::with(['user', 'items.menu'])->get()->map(function ($order) {
            return [
                'Order ID' => $order->id,
                'Customer' => $order->user->name,
                'Order Summary' => $order->items_summary,
                'Total Order Price' => $order->total_order_price,
                'Status' => $order->status,
                'Date' => $order->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Order ID',
            'Customer',
            'Order Summary',
            'Total Order Price',
            'Status',
            'Date',
        ];
    }
}

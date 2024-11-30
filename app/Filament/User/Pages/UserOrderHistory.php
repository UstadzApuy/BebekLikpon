<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Models\Pemesanan;

class UserOrderHistory extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Riwayat Pemesanan';


    protected static string $view = 'filament.pages.user-order-history';

    public function getOrders()
    {
        // Mengambil riwayat pemesanan berdasarkan user ID yang diambil dari sesi login
        // Asumsi hanya user tertentu yang dapat mengakses halaman ini
        return Pemesanan::where('user_id', auth()->id())
            ->with(['items.menu'])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}

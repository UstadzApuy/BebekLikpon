<x-filament::page>
    <div class="space-y-4 mx-auto max-w-6xl">
        <h1 class="text-2xl font-bold">Riwayat Pemesanan</h1>
        <p class="text-gray-600">Lihat status pemesanan Anda di sini.</p>

        @if($this->getOrders()->isEmpty())
            <p class="text-gray-500">Belum ada pemesanan.</p>
        @else
            <div class="overflow-hidden border rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Order ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Tanggal</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Item Pesanan</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($this->getOrders() as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <ul class="list-disc pl-6">
                                        @foreach ($order->items as $item)
                                            <li>
                                                {{ $item->menu->title }} ({{ $item->quantity }} x Rp {{ number_format($item->menu->price, 0, ',', '.') }}) = Rp {{ number_format($item->total_price, 0, ',', '.') }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($order->status == 'completed') bg-green-100 text-green-800
                                        @elseif($order->status == 'pending') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($order->total_order_price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-filament::page>

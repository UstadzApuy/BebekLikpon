<x-filament::page>
    
    <div class="container mx-auto max-w-4xl px-4 py-6">
        <h2 class="text-2xl font-bold text-center mb-4">Shopping Cart</h2>
        
        @if (empty($cart))
            <p class="text-gray-600 text-center">Your cart is empty.</p>
        @else
            <table class="w-full border-collapse border border-gray-300 mb-6">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">Thumbnail</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Quantity</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Total</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart as $id => $item)
                        @php $total += $item['price'] * $item['quantity']; @endphp
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                <img src="{{ Storage::url($item['thumbnail']) }}" alt="{{ $item['name'] }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item['name'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form action="{{ route('cart.update', $item['id']) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width: 60px; padding: 4px; border: 1px solid #ccc; border-radius: 4px; text-align: center;">
                                    <button type="submit" style="background-color: #007bff; color: white; padding: 4px 8px; border-radius: 4px; margin-left: 4px;">Update</button>
                                </form>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form action="{{ route('cart.remove', $item['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #dc3545; color: white; padding: 4px 8px; border-radius: 4px;">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="text-right mb-6">
                <h4 class="text-lg font-bold">Total: Rp {{ number_format($total, 0, ',', '.') }}</h4>
            </div>

            @if (session('success'))
                <p class="text-green-500 mb-4">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="text-red-500 mb-4">{{ session('error') }}</p>
            @endif

            <form action="{{ route('cart.checkout') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="payment_proof" class="block mb-2 font-medium">Upload Bukti Pembayaran</label>
                    <p class="text-sm text-gray-500 mb-2">No. Rekening: BNI || 0800981639</p>
                    <input type="file" name="payment_proof" id="payment_proof" accept="image/*" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
                </div>
                <button type="submit" style="background-color: #28a745; color: white; padding: 8px 16px; border-radius: 4px;">Submit Checkout</button>
            </form>
        @endif
    </div>
</x-filament::page>

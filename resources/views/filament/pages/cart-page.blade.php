<x-filament::page>
    <h2 class="text-2xl font-bold">Shopping Cart</h2>
    @if (empty($cart))
        <p>Your cart is empty.</p>
    @else
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td><img src="{{ Storage::url($item['thumbnail']) }}" alt="{{ $item['name'] }}" class="w-16 h-16"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3 class="text-right">Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>
    @endif
</x-filament::page>

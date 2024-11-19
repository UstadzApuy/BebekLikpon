<x-filament::page>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($menus as $menu)
            <div class="border rounded shadow p-4">
                <img src="{{ Storage::url($menu->thumbnail) }}" alt="{{ $menu->title }}" class="w-full h-40 object-cover">
                <h3 class="text-lg font-bold mt-2">{{ $menu->title }}</h3>
                <p class="text-gray-600">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                <form action="{{ route('cart.add', $menu->id) }}" method="post" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>
</x-filament::page>

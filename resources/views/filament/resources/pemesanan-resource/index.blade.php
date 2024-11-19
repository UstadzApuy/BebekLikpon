@extends('filament::page')

@section('content')
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
        @foreach($menus as $menu)
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{{ $menu->thumbnail }}" alt="{{ $menu->name }}" class="w-full h-32 object-cover rounded">
                
                <h3 class="text-lg font-semibold mt-2">{{ $menu->name }}</h3>
                
                <div class="flex items-center justify-between mt-3">
                    <button onclick="decreaseQuantity({{ $menu->id }})" class="px-2 py-1 bg-gray-200 rounded">-</button>
                    <input type="number" id="quantity-{{ $menu->id }}" value="1" min="1" class="text-center w-12 border rounded">
                    <button onclick="increaseQuantity({{ $menu->id }})" class="px-2 py-1 bg-gray-200 rounded">+</button>
                </div>
                
                <button onclick="addToCart({{ $menu->id }})" class="w-full mt-3 px-4 py-2 bg-blue-500 text-white rounded">
                    Add to Cart
                </button>
            </div>
        @endforeach
    </section>

    <script>
        function decreaseQuantity(id) {
            const quantityInput = document.getElementById(`quantity-${id}`);
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        function increaseQuantity(id) {
            const quantityInput = document.getElementById(`quantity-${id}`);
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function addToCart(id) {
            const quantity = document.getElementById(`quantity-${id}`).value;
            // Add AJAX call or form submission to add the item to the cart with the specified quantity.
        }
    </script>
@endsection

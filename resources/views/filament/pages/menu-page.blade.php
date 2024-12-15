<x-filament::page dark-mode="false">
    <div class="container mx-auto max-w-6xl px-4 py-6">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800 dark:text-gray-100">Our Menu</h2>
        
        <!-- Grid Menu -->
        <div style="
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 1rem;">
            @forelse ($menus as $menu)
                <!-- Card -->
                <div style="
                    background-color: #fff;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    overflow: hidden;
                    display: flex;
                    flex-direction: column;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                ">
                    <!-- Thumbnail -->
                    <div style="height: 200px; background-color: #f9f9f9;">
                        <img src="{{ Storage::url($menu->thumbnail) }}" 
                             alt="{{ $menu->title }}"
                             style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <!-- Content -->
                    <div style="padding: 16px; flex-grow: 1; display: flex; flex-direction: column;">
                        <h4 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 8px; color: #333;">
                            {{ $menu->title }}
                        </h4>
                        <p style="color: #28a745; font-weight: bold; margin-bottom: 16px;">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </p>

                        <!-- Action Buttons -->
                        <div style="display: flex; justify-content: space-between; margin-top: auto;">
                            <form action="{{ route('cart.add', $menu->id) }}" method="POST" style="display: flex; align-items: center;">
                                @csrf
                                <input type="number" name="quantity" value="1" min="1"
                                       style="width: 50px; text-align: center; padding: 4px; border: 1px solid #ccc; border-radius: 4px; margin-right: 8px;">
                                <button type="submit" style="background-color: #007bff; color: white; padding: 5px 8px; border-radius: 4px;">
                                    Add to Cart
                                </button>
                            </form>
                            <a href="{{ route('menu.show', $menu->slug) }}"
                               style="background-color: #28a745; color: white; padding: 5px 8px; border-radius: 4px; text-decoration: none;">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div style="
                    grid-column: span 3;
                    text-align: center;
                    background-color: #fff3cd;
                    color: #856404;
                    padding: 16px;
                    border-radius: 8px;">
                    No menus available at the moment. Please check back later!
                </div>
            @endforelse
        </div>
    </div>
</x-filament::page>

<x-filament::page>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Our Menu</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f8f9fa;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
                text-align: center;
            }

            h2 {
                margin-bottom: 20px;
                color: #333;
                font-size: 2rem;
            }

            .menu-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 20px;
            }

            .menu-item {
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                display: flex;
                flex-direction: column;
                text-align: left;
            }

            .menu-thumbnail {
                width: 100%;
                height: 200px;
                background-size: cover;
                background-position: center;
            }

            .menu-details {
                padding: 15px;
                flex: 1;
            }

            .menu-title {
                font-size: 1.2rem;
                margin-bottom: 10px;
                color: #333;
                text-decoration: none;
            }

            .menu-title:hover {
                color: #007bff;
            }

            .menu-price {
                font-size: 1rem;
                color: #28a745;
                margin-bottom: 15px;
            }

            .menu-actions {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: auto;
            }

            .menu-actions form {
                display: flex;
                align-items: center;
            }

            .menu-actions input[type="number"] {
                width: 60px;
                margin-right: 10px;
                padding: 5px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            .menu-actions button,
            .menu-actions a {
                background-color: #007bff;
                color: #fff;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                cursor: pointer;
                font-size: 0.9rem;
            }

            .menu-actions a {
                background-color: #6c757d;
            }

            .menu-actions button:hover,
            .menu-actions a:hover {
                opacity: 0.9;
            }

            .alert {
                padding: 15px;
                background-color: #ffc107;
                color: #856404;
                border-radius: 4px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Our Menu</h2>
            <div class="menu-grid">
                @forelse ($menus as $menu)
                    <div class="menu-item">
                        <div class="menu-thumbnail" style="background-image: url('{{ Storage::url($menu->thumbnail) }}');"></div>
                        <div class="menu-details">
                            <h4 class="menu-title">
                                <a href="{{ route('menu.show', $menu->slug) }}">{{ $menu->title }}</a>
                            </h4>
                            <p class="menu-price">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                            <div class="menu-actions">
                                <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="1" min="1">
                                    <button type="submit">Add to Cart</button>
                                </form>
                                <a href="{{ route('menu.show', $menu->slug) }}">Details</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert">No menus available at the moment. Please check back later!</div>
                @endforelse
            </div>
        </div>
    </body>

    </html>
</x-filament::page>

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pemesanan;
use App\Models\PemesananItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
{
    $menuItem = Menu::find($id);
    if (!$menuItem) {
        return redirect()->back()->with('error', 'Menu item not found.');
    }

    $quantity = $request->input('quantity', 1);
    $user = auth()->user();

    $cart = Cart::firstOrNew(['user_id' => $user->id, 'menu_id' => $id]);
    $cart->quantity += $quantity;
    $cart->save();

    return redirect()->back()->with('success', 'Item added to cart!');
}

    

    public function showCart()
    {
        $user = auth()->user(); // Mendapatkan user yang sedang login
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to login to view your cart.');
        }

        // Ambil data cart dari database
        $cartItems = Cart::where('user_id', $user->id)
            ->with('menu') // Pastikan mengambil relasi menu
            ->get();

        // Transform data untuk dikirim ke view
        $cart = $cartItems->map(function ($item) {
            return [
                'thumbnail' => $item->menu->thumbnail,
                'name' => $item->menu->title,
                'price' => $item->menu->price,
                'quantity' => $item->quantity,
            ];
        });

        return view('frontend.cart', compact('cart'));
    }


    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = $request->input('quantity', 1);
            $cart[$id]['quantity'] = max($quantity, 1); // Pastikan kuantitas minimal 1
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Cart updated successfully!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Item removed from cart!');
    }



    
    public function checkout()
    {
        $user = auth()->user();
    
        // Ambil item cart user
        $cartItems = Cart::where('user_id', $user->id)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Cart is empty!');
        }
    
        // Buat pemesanan baru
        $pemesanan = Pemesanan::create([
            'user_id' => $user->id,
            'status' => 'pending', // Status awal
        ]);
    
        // Tambahkan item ke pemesanan_items
        foreach ($cartItems as $item) {
            PemesananItem::create([
                'pemesanan_id' => $pemesanan->id,
                'menu_id' => $item->menu_id,
                'quantity' => $item->quantity,
                'total_price' => $item->quantity * $item->menu->price,
            ]);
        }
    
        // Hapus cart setelah checkout
        Cart::where('user_id', $user->id)->delete();
    
        return redirect()->route('menu.index')->with('success', 'Order placed successfully!');
    }
    
    

}

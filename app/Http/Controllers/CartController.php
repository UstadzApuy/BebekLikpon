<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pemesanan;
use App\Models\PemesananItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Filament\Notifications\Notification;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $menuItem = Menu::find($id);
        if (!$menuItem) {
            Notification::make()
                ->title('Error')
                ->body('Menu item not found.')
                ->danger()
                ->send();

            return redirect()->back();
        }

        $quantity = $request->input('quantity', 1);
        $user = auth()->user();

        $cart = Cart::firstOrNew(['user_id' => $user->id, 'menu_id' => $id]);
        $cart->quantity += $quantity;
        $cart->save();

        Notification::make()
            ->title('Success')
            ->body('Item added to cart!')
            ->success()
            ->send();

        return redirect()->back();
    }



    public function showCart()
    {
        $user = auth()->user(); // Mendapatkan user yang sedang login
        if (!$user) {
            Notification::make()
                ->title('Error')
                ->body('You need to login to view your cart.')
                ->danger()
                ->send();

            return redirect()->route('login');
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
        // Cari item cart berdasarkan id dan user yang login
        $cartItem = Cart::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$cartItem) {
            Notification::make()
                ->title('Error')
                ->body('Cart item not found.')
                ->danger()
                ->send();

            return redirect()->back();
        }

        // Validasi input kuantitas
        $quantity = $request->input('quantity', 1);
        if ($quantity < 1) {
            Notification::make()
                ->title('Error')
                ->body('Quantity must be at least 1.')
                ->danger()
                ->send();

            return redirect()->back();
        }

        // Update kuantitas
        $cartItem->quantity = $quantity;
        $cartItem->save();

        Notification::make()
            ->title('Success')
            ->body('Cart updated successfully!')
            ->success()
            ->send();

        return redirect()->back();
    }


    public function remove($id)
    {
        // Cari item cart berdasarkan id dan user yang login
        $cartItem = Cart::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$cartItem) {
            // Jika item tidak ditemukan, tampilkan notifikasi error
            Notification::make()
                ->title('Error')
                ->body('Cart item not found.')
                ->danger()
                ->send();

            return redirect()->back();
        }

        // Hapus item cart dari database
        $cartItem->delete();

        // Kirim notifikasi sukses setelah item berhasil dihapus
        Notification::make()
            ->title('Success')
            ->body('Item removed from cart!')
            ->success()
            ->send();

        // Redirect kembali ke halaman cart
        return redirect()->back();
    }





    public function checkout(Request $request)
    {
        $user = auth()->user();

        // Validasi input termasuk file foto pembayaran
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil item cart user
        $cartItems = Cart::where('user_id', $user->id)->with('menu')->get();


        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Cart is empty!');
        }

        // Upload foto pembayaran
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        // Buat pemesanan baru
        $pemesanan = Pemesanan::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'payment_proof' => $paymentProofPath, // Simpan path ke database
        ]);

        // Tambahkan item ke pemesanan_items
        foreach ($cartItems as $item) {
            if (!$item->menu) {
                return redirect()->route('cart.show')->with('error', 'Some cart items are invalid. Please update your cart.');
            }
            PemesananItem::create([
                'pemesanan_id' => $pemesanan->id,
                'menu_id' => $item->menu_id,
                'quantity' => $item->quantity,
                'total_price' => $item->quantity * $item->menu->price,
            ]);
        }

        // Hapus cart setelah checkout
        Cart::where('user_id', $user->id)->delete();

        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}

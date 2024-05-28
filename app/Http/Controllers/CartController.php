<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Keranjang;
class CartController extends Controller
{
    public function show()
    {
        
        $loggedInUserId = Session::get('loggedInUserId');
            
        // Mengambil wishlist items untuk pengguna yang saat ini diautentikasi
        $cartItems = Keranjang::where('keranjang.ID_User', $loggedInUserId)
            ->join('catalog', 'keranjang.ID_catalog', '=', 'catalog.ID_catalog')
            ->select('catalog.product_name', 'catalog.harga', 'catalog.imgproduct')
            ->get();
        
        // Mengembalikan view wishlist beserta wishlist items
        return view('cart', compact('cartItems'));
    }
    public function add(Request $request)
    {
        // Validasi request
        $request->validate([
            'ID_catalog' => 'required|exists:catalog,ID_catalog',
        ]);

        $loggedInUserId = Session::get('loggedInUserId');

        // Cek apakah item sudah ada di keranjang
        $exists = Keranjang::where('ID_User', $loggedInUserId)
            ->where('ID_catalog', $request->ID_catalog)
            ->exists();

        if (!$exists) {
            $latestidkeranjang = Keranjang::max('ID_keranjang');
            $newID = 'K' . str_pad((intval(substr($latestidkeranjang, 1)) + 1), 4, '0', STR_PAD_LEFT);
            
            // Tambahkan item ke keranjang
            Keranjang::create([
                'ID_keranjang' => $newID,
                'ID_user' => $loggedInUserId,
                'ID_catalog' => $request->ID_catalog,
                // Harga dan field lain bisa ditambahkan sesuai kebutuhan
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart.');
    }
}

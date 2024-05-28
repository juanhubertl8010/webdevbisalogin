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
}

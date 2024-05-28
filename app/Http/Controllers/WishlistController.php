<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Wishlist;
use Illuminate\Http\Request;
class WishlistController extends Controller
{
    public function show()
    {
        // Periksa apakah pengguna telah diautentikasi

            // Mendapatkan pengguna yang saat ini diautentikasi
          
    
            // Mengecek apakah pengguna memiliki item di wishlist
    
           
            $loggedInUserId = Session::get('loggedInUserId');
            
            // Mengambil wishlist items untuk pengguna yang saat ini diautentikasi
            $wishlistItems = Wishlist::where('wishlist.ID_User', $loggedInUserId)
                ->join('catalog', 'wishlist.ID_catalog', '=', 'catalog.ID_catalog')
                ->select('catalog.product_name', 'catalog.harga', 'catalog.imgproduct')
                ->get();
            
            // Mengembalikan view wishlist beserta wishlist items
            return view('Wishlist', compact('wishlistItems'));
           
        } 
        public function add(Request $request)
{
    // Validasi request
    $request->validate([
        'ID_catalog' => 'required|exists:catalog,ID_catalog',
    ]);

    $loggedInUserId = Session::get('loggedInUserId');

    // Cek apakah item sudah ada di wishlist
    $exists = Wishlist::where('ID_User', $loggedInUserId)
        ->where('ID_catalog', $request->ID_catalog)
        ->exists();

    if (!$exists) {
        // Tambahkan item ke wishlist
        Wishlist::create([
            'ID_User' => $loggedInUserId,
            'ID_catalog' => $request->ID_catalog,
            // Harga dan field lain bisa ditambahkan sesuai kebutuhan
        ]);
    }

    return redirect()->back()->with('success', 'Item added to wishlist.');
}
    }
    

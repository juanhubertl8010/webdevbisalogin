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
                ->where('wishlist.statusdel', 'F')
                ->join('catalog', function($join) {
                    $join->on('wishlist.ID_catalog', '=', 'catalog.ID_catalog')
                        ->where('catalog.statusdel', 'F');
                })
                ->select('wishlist.ID_wishlist', 'catalog.product_name', 'catalog.harga', 'catalog.imgproduct')
                ->distinct('wishlist.ID_catalog')
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

    $exists = Wishlist::where('ID_User', $loggedInUserId)
    ->where('ID_catalog', $request->ID_catalog)
    ->where('statusdel', 'F')
    ->exists();

    if (!$exists) {
        // Tambahkan item ke wishlist
        $latestidwishlist = Wishlist::max('ID_wishlist');
        $newID = 'W' . str_pad((intval(substr( $latestidwishlist, 1)) + 1), 4, '0', STR_PAD_LEFT);
        Wishlist::create([
            'ID_wishlist' => $newID,
            'ID_User' => $loggedInUserId,
            'ID_catalog' => $request->ID_catalog,
            // Harga dan field lain bisa ditambahkan sesuai kebutuhan
        ]);
    }

    return redirect()->back()->with('success', 'Item added to wishlist.');
}
public function remove(Request $request)
{
    // Ambil ID wishlist dari request
    $ID_wishlist = $request->ID_wishlist;

    // Periksa apakah item wishlist yang ingin dihapus dimiliki oleh pengguna yang sedang login
    $wishlist = Wishlist::where('ID_wishlist', $ID_wishlist)->first();
    $updated = Wishlist::where('ID_wishlist', $ID_wishlist)
 ->update(['statusdel' => 'T']);
    if ($updated) {
        // Logging sebelum melakukan update
        return redirect()->back()->with('success', 'Item removed from wishlist.');
    } else {
        return redirect()->back()->with('error', 'Failed to remove item from wishlist.');
    }
    
    }
}

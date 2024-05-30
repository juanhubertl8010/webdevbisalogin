<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Keranjang;
use App\Models\Transaksi;
class CartController extends Controller
{
    public function show()
    {
        
        $loggedInUserId = Session::get('loggedInUserId');
            
        // Mengambil wishlist items untuk pengguna yang saat ini diautentikasi
        $cartItems = Keranjang::where('keranjang.ID_User', $loggedInUserId)
        ->where('keranjang.statusdel', 'F')
        ->join('catalog', function($join) {
            $join->on('keranjang.ID_catalog', '=', 'catalog.ID_catalog')
                ->where('catalog.statusdel', 'F');
        })
        ->select('keranjang.ID_keranjang', 'catalog.product_name', 'catalog.harga', 'catalog.imgproduct')
        ->distinct('keranjang.ID_catalog')
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
            ->where('statusdel', 'F')
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
                // Tambahkan harga atau field lainnya sesuai kebutuhan
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart.');
    }
    public function remove(Request $request)
{
    // Ambil ID wishlist dari request
    $ID_keranjang = $request->ID_keranjang;

    // Periksa apakah item wishlist yang ingin dihapus dimiliki oleh pengguna yang sedang login
    $keranjang = Keranjang::where('ID_keranjang', $ID_keranjang)->first();
    $updated = Keranjang::where('ID_keranjang', $ID_keranjang)
 ->update(['statusdel' => 'T']);
    if ($updated) {
        // Logging sebelum melakukan update
        return redirect()->back()->with('success', 'Item removed from wishlist.');
    } else {
        return redirect()->back()->with('error', 'Failed to remove item from wishlist.');
    }
    
    }
    public function checkout(Request $request)
{
    $loggedInUserId = Session::get('loggedInUserId');
    $itemIds = explode(',', $request->input('item_ids'));

    // Ambil item dari keranjang yang akan diproses
    $items = Keranjang::where('keranjang.ID_user', $loggedInUserId)
                      ->whereIn('ID_keranjang', $itemIds)
                      ->where('keranjang.statusdel', 'F')
                      ->join('catalog', 'keranjang.ID_catalog', '=', 'catalog.ID_catalog')
                      ->select('keranjang.*', 'catalog.harga')
                      ->get();

    foreach ($items as $item) {
        // Cek apakah sudah ada transaksi untuk katalog yang sama dengan statusdel 'F' dan statusbyr 'F'
        $existingTransaction = Transaksi::where('ID_catalog', $item->ID_catalog)
                                        ->where('ID_user', $loggedInUserId)
                                        ->where('statusdel', 'F')
                                        ->where('statusbyr', 'F')
                                        ->exists();

        if ($existingTransaction) {
            // Jika ada, abaikan item ini dan lanjutkan ke item berikutnya
            continue;
        }

        // Dapatkan ID_transaksi terbaru dan buat ID_transaksi baru
        $latestIDTransaksi = Transaksi::max('ID_transaksi');
        $newIDTransaksi = 'T' . str_pad((intval(substr($latestIDTransaksi, 1)) + 1), 4, '0', STR_PAD_LEFT);

        // Masukkan item ke dalam tabel transaksi
        Transaksi::create([
            'ID_transaksi' => $newIDTransaksi,
            'ID_catalog' => $item->ID_catalog,
            'transaksi_date' => now(),
            'ID_user' => $loggedInUserId,
            'harga' => $item->harga,  // Menggunakan harga dari join dengan catalog
            'statusdel' => 'F',  // Pastikan untuk menyetujui statusdel jika diperlukan
            'statusbyr' => 'F',  // Pastikan untuk menyetujui statusbyr jika diperlukan
        ]);
    }

    // Update statusdel untuk item yang ada di item_ids menjadi 'T'
    Keranjang::where('ID_user', $loggedInUserId)
             ->whereIn('ID_keranjang', $itemIds)
             ->update(['statusdel' => 'T']);

    // Redirect ke halaman checkout (sesuaikan URL halaman checkout Anda)
    return redirect()->route('checkout');
}
}

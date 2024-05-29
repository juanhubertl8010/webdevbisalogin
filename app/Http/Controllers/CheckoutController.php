<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Transaksi;
class CheckoutController extends Controller
{
    public function show()
    {
        // Periksa apakah pengguna telah diautentikasi

            // Mendapatkan pengguna yang saat ini diautentikasi
          
    
            // Mengecek apakah pengguna memiliki item di wishlist
    
           
            $loggedInUserId = Session::get('loggedInUserId');
    
            // Mengambil wishlist items untuk pengguna yang saat ini diautentikasi
            $transaksiItems = Transaksi::where('transaksi.ID_User', $loggedInUserId)
                ->where('transaksi.statusdel', 'F')
                ->join('catalog', function($join) {
                    $join->on('transaksi.ID_catalog', '=', 'catalog.ID_catalog')
                        ->where('catalog.statusdel', 'F');
                })
                ->select('transaksi.ID_transaksi', 'catalog.product_name', 'catalog.harga', 'catalog.imgproduct')
                ->distinct('transaksi.ID_catalog')
                ->get();
            
            // Mengembalikan view wishlist beserta wishlist items
            return view('checkout', compact('transaksiItems'));
           
        } 
        public function processPayment(Request $request)
{
    // Mendapatkan id transaksi dan notes dari form
    $itemIds = $request->input('item_ids');
    $notes = json_decode($request->input('item_notes'), true);

    // Mengubah statusdel dan statusbyr menjadi 'T' untuk item-item yang dipilih
    $transaksiIds = explode(',', $itemIds);
    foreach ($transaksiIds as $id) {
        $note = isset($notes[$id]) ? $notes[$id] : '';
        Transaksi::where('ID_transaksi', $id)->update([
            'statusdel' => 'T',
            'statusbyr' => 'T',
            'deskripsi' => $note,
        ]);
    }

    // Redirect ke halaman utama
    return redirect()->route('homepage');
}
      
}

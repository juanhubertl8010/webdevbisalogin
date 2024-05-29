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
        public function makePayment(Request $request)
    {
        // Ambil data deskripsi dari permintaan
        $description = $request->input('description');

        // Simpan data ke dalam tabel transaksi dan ubah statusdel dan status byr menjadi 'T'
        $transaction = new Transaksi();
        $transaction->deskripsi = $description;
        $transaction->statusdel = 'T';
        $transaction->status_byr = 'T';
        $transaction->save();

        // Response jika pembayaran berhasil
        return response()->json(['message' => 'Payment successful']);
    }

}

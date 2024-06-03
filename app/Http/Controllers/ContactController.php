<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Transaksi;
class ContactController extends Controller
{
    public function show()
    {
        $loggedInUserId = Session::get('loggedInUserId');
    
        // Mengambil wishlist items untuk pengguna yang saat ini diautentikasi
        $transaksiItems = Transaksi::where('transaksi.ID_User', $loggedInUserId)
            ->where('transaksi.statusdel', 'T')
            ->where('transaksi.statusbyr', 'T')
            ->join('catalog', function($join) {
                $join->on('transaksi.ID_catalog', '=', 'catalog.ID_catalog')
                ->whereIn('catalog.statusdel', ['F', 'T']); // Include 'F' or 'T' status
            })
            ->select('transaksi.ID_transaksi', 'transaksi.deskripsi','catalog.product_name', 'catalog.harga', 'catalog.imgproduct')
            ->distinct('transaksi.ID_catalog')
            ->simplePaginate(5);
        
        // Mengembalikan view wishlist beserta wishlist items
        return view('Transuser', compact('transaksiItems'));
    }
}

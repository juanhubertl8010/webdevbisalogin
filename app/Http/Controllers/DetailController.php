<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Catalog; // Import model Catalog
use App\Models\Keranjang;
class DetailController extends Controller
{
    public function show($id_catalog)
    {
        $product = Catalog::where('ID_catalog', $id_catalog)->first();

        // Periksa apakah produk ditemukan
        if ($product) {
            // Jika produk ditemukan, lemparkan data produk ke view
            return view('detail', compact('product'));
        } else {
            // Jika produk tidak ditemukan, kembalikan response 404
            abort(404);
        }
    }
    public function add(Request $request)
    {
        $loggedInUserId = Session::get('loggedInUserId');
        if (is_null($loggedInUserId)) {
            // Debugging statement
           // dd('Session value is null');
        } else {
            // Debugging statement
           // dd('Session value:', $loggedInUserId);
        }
        
        // Validasi request
        $request->validate([
            'ID_catalog' => 'required|exists:catalog,ID_catalog',
        ]);
        
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
}

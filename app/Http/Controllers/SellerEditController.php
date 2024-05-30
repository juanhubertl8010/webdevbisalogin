<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Catalog;
use Illuminate\Http\Request;

class SellerEditController extends Controller
{
    public function show(Request $request)
    {
        // Jika produk tidak ditemukan, Anda dapat menangani kasus ini sesuai kebutuhan aplikasi Anda
    
        $ID_catalog = $request->ID_catalog;
        
        // Ambil detail produk berdasarkan ID_catalog
        $product = Catalog::where('ID_catalog', $ID_catalog)->first();
        
        // Periksa apakah produk ditemukan
        if (!$product) {
            // Handle kasus jika produk tidak ditemukan
            return redirect()->back()->with('error', 'Product not found.');
        }
        
        // Tampilkan halaman Sellereditproduct.blade.php dengan data produk yang sesuai
        return view('Sellereditproduct', compact('product'));
    }
    public function updateProduct(Request $request) {
        // Validasi data input jika diperlukan
        $validatedData = $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'harga' => 'required|numeric',
            'newImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // tambahkan validasi untuk gambar
        ]);
        $ID_catalog = $request->ID_catalog;
        // Ambil detail produk yang ingin diperbarui
        Catalog::where('ID_catalog', $ID_catalog)->update([
            'product_name' => $request->productName,
            'description' => $request->productDescription,
            'harga' => $request->harga,
        ]);
        
        // Periksa apakah pengguna mengunggah gambar baru
        if ($request->hasFile('newImage')) {
            // Simpan gambar baru
            $newImage = $request->file('newImage');
            $imageName = time() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img'), $imageName);
            // Update atribut imgproduct
            Catalog::where('ID_catalog', $ID_catalog)->update(['imgproduct' => $imageName]);
        }
        
        // Redirect kembali ke halaman MyproductSeller.blade.php dengan pesan sukses
        return redirect()->route('MyproductSeller')->with('success', 'Product updated successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog; // Import model Catalog

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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog; // Import model Catalog

class DetailController extends Controller
{
    public function show($id_catalog)
    {
        // Lakukan sesuatu dengan $id_catalog, seperti mendapatkan detail produk dari ID catalog
        
        $product = Catalog::findOrFail($id_catalog); // Misalnya, mendapatkan detail produk berdasarkan ID catalog
       
        // Kemudian lemparkan data produk ke view
        return view('detail', compact('product'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
class ShopController extends Controller
{
    public function show()
    {
        $catalogItems = Catalog::simplepaginate(9);

        // Pass the catalog items to the view
        return view('shop', ['catalogItems' => $catalogItems]);
    }
    public function showCatalogByGame($ID_game)
{
    // Dapatkan item katalog berdasarkan ID_game
    $catalogItems = Catalog::where('ID_game', $ID_game)->simplePaginate(9);

    // Pass the catalog items to the view
    return view('shop', ['catalogItems' => $catalogItems]);
}
}

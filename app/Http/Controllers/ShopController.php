<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Game; // Correctly import the Game model
use App\Models\User;
class ShopController extends Controller
{
    // public function show()
    // {
    //     $catalogItems = Catalog::simplepaginate(9);

    //     // Pass the catalog items to the view
    //     return view('shop', ['catalogItems' => $catalogItems]);
    // }
    // public function showCatalogByGame($ID_game)
    // {
    // // Dapatkan item katalog berdasarkan ID_game
    // $catalogItems = Catalog::where('ID_game', $ID_game)->simplePaginate(9);

    // // Pass the catalog items to the view
    // return view('shop', ['catalogItems' => $catalogItems]);
    // }

    public function show()
    {
        // Fetch catalog items with seller information
        // $catalogItems = Catalog::with('seller')->simplePaginate(9);
        $catalogItems = Catalog::simplePaginate(9);

        return view('shop', [
            'catalogItems' => $catalogItems,
            'isGeneralView' => true,
            'game' => null
        ]);
    }

    public function showCatalogByGame($ID_game)
    {
        // Fetch catalog items based on ID_game with seller information
        // $catalogItems = Catalog::where('ID_game', $ID_game)->with('seller')->simplePaginate(9);
        $catalogItems = Catalog::where('ID_game', $ID_game)->simplePaginate(9);
        // $catalogItems = Catalog::simplePaginate(8, ['*'], 'products_page', $productsPage);
        $game = Game::find($ID_game);
        if (!$game) {
            abort(404);
        }

     

        return view('shop', [
            'catalogItems' => $catalogItems,
            'isGeneralView' => false,
            'game' => $game
        ]);
    }
}

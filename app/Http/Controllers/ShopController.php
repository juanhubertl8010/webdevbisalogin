<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Game; // Correctly import the Game model
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
        $catalogItems = Catalog::simplePaginate(9);

        // Pass the catalog items to the view
        return view('shop', [
            'catalogItems' => $catalogItems,
            'isGeneralView' => true, // Flag to indicate general shop view
            'game' => null
        ]);
    }

    public function showCatalogByGame($ID_game)
    {
        // Get catalog items based on the ID_game
        $catalogItems = Catalog::where('ID_game', $ID_game)->simplePaginate(9);

        // Fetch the game details (assuming you have a Game model)
        $game = Game::find($ID_game);
        
        if (!$game) {
            abort(404); // Handle game not found
        }

        // Pass the catalog items to the view
        return view('shop', [
            'catalogItems' => $catalogItems,
            'isGeneralView' => false, // Flag to indicate specific product view
            'game' => $game
        ]);
    }
}

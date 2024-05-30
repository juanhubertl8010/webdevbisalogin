<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Game; // Correctly import the Game model
use App\Models\User;

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

    class ShopController extends Controller
{
    public function show()
    {
        $catalogItems = Catalog::where('statusdel', 'F')->simplePaginate(9);

        return view('shop', [
            'catalogItems' => $catalogItems,
            'isGeneralView' => true,
            'game' => null
        ]);
    }

    public function showCatalogByGame($ID_game)
    {
        $catalogItems = Catalog::where('ID_game', $ID_game)
                               ->where('statusdel', 'F')
                               ->simplePaginate(9);

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

    public function index(Request $request)
    {
        $search = $request->query('search');
        if ($search) {
            $catalogItems = Catalog::where(function($query) use ($search) {
                                    $query->where('product_name', 'LIKE', "%{$search}%")
                                          ->orWhere('description', 'LIKE', "%{$search}%");
                                })
                                ->where('statusdel', 'F')
                                ->simplePaginate(9);
        } else {
            $catalogItems = Catalog::where('statusdel', 'F')->simplePaginate(9);
        }

        return view('shop', [
            'catalogItems' => $catalogItems
        ]);
    }
}
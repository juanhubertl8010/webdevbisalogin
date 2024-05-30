<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Catalog;
use App\Models\User;
class AdminhomeController extends Controller
{
    public function show(Request $request)
    {
        $productsPage = $request->query('products_page', 1);
        $gamesPage = $request->query('games_page', 1);
        $products = Catalog::where('statusdel', 'F')->simplePaginate(8, ['*'], 'products_page', $productsPage);
    
        $games = Game::simplePaginate(8, ['*'], 'games_page', $gamesPage);

        return view('adminhome', [
            'products' => $products,
            'games' => $games
        ]);
    }
    public function removeProduct(Request $request)
{
    $ID_catalog = $request->input('ID_catalog');


    $catalog = Catalog::where('ID_catalog', $ID_catalog)->first();
    $updated = Catalog::where('ID_catalog', $ID_catalog)
 ->update(['statusdel' => 'T']);
    // Update statusdel to 'T'

    if ($updated) {
        return redirect()->route('adminhome')->with('success', 'Product removed successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to remove product.');
    }
}
}

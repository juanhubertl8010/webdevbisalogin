<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\User;
use App\Models\Game; // Import the Game model
class AllcartController extends Controller
{
    public function show(Request $request)
    {
        // Fetch all games
        $games = Game::all();

        // Get the selected game ID from the request
        $selectedGame = $request->input('game');

        $cartItems = Keranjang::where('keranjang.statusdel', 'F')
            ->join('catalog', function($join) use ($selectedGame) {
                $join->on('keranjang.ID_catalog', '=', 'catalog.ID_catalog')
                    ->where('catalog.statusdel', 'F');
                if ($selectedGame) {
                    $join->where('catalog.ID_game', '=', $selectedGame);
                }
            })
            ->join('user', 'user.ID_user', '=', 'keranjang.ID_User')
            ->select('keranjang.ID_keranjang', 'user.username', 'catalog.product_name', 'catalog.harga')
            ->simplePaginate(10);

        return view('Allcart', compact('cartItems', 'games', 'selectedGame'));
    }
}

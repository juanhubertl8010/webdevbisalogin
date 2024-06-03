<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Game; // Import the Game model
class AllwishlistController extends Controller
{
    public function show(Request $request)
    {
        // Fetch all games
        $games = Game::all();

        // Get the selected game ID from the request
        $selectedGame = $request->input('game');

        $wishlistItems = Wishlist::where('wishlist.statusdel', 'F')
            ->join('catalog', function($join) use ($selectedGame) {
                $join->on('wishlist.ID_catalog', '=', 'catalog.ID_catalog')
                    ->where('catalog.statusdel', 'F');
                if ($selectedGame) {
                    $join->where('catalog.ID_game', '=', $selectedGame);
                }
            })
            ->join('user', 'user.ID_user', '=', 'wishlist.ID_User')
            ->select('wishlist.ID_wishlist', 'user.username', 'catalog.product_name', 'catalog.harga')
            ->simplePaginate(10);

        return view('Allwishlist', compact('wishlistItems', 'games', 'selectedGame'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Game; // Import the Game model
class AllTransController extends Controller
{
    public function show(Request $request)
    {
        // Fetch all games
        $games = Game::all();

        // Get the selected game ID from the request
        $selectedGame = $request->input('game');

        $transItems = Transaksi::where(function($query) {
            $query->where('transaksi.statusdel', 'F')
                  ->orWhere('transaksi.statusdel', 'T');
        })
        ->join('catalog', function($join) use ($selectedGame) {
            $join->on('transaksi.ID_catalog', '=', 'catalog.ID_catalog')
                ->where('catalog.statusdel', 'F');
            if ($selectedGame) {
                $join->where('catalog.ID_game', '=', $selectedGame);
            }
        })
        ->join('user', 'user.ID_user', '=', 'transaksi.ID_User')
        ->select('transaksi.ID_transaksi', 'user.username', 'catalog.product_name', 'catalog.harga')
        ->simplePaginate(10);

        return view('AllTrans', compact('transItems', 'games', 'selectedGame'));
    }
}

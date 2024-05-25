<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Catalog;
class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $productsPage = $request->query('products_page', 1);
        $gamesPage = $request->query('games_page', 1);

        $products = Catalog::with('seller')->simplePaginate(8, ['*'], 'products_page', $productsPage);
        $games = Game::simplePaginate(8, ['*'], 'games_page', $gamesPage);
        return view('homepage', [
            'products' => $products,
            'games' => $games
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Game;
use App\Models\User;
class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $productsPage = $request->query('products_page', 1);
        $gamesPage = $request->query('games_page', 1);

        // Use these page numbers in the pagination
        $products = Catalog::simplePaginate(8, ['*'], 'products_page', $productsPage);
        // $products = Catalog::with('seller')->simplePaginate(8, ['*'], 'products_page', $productsPage);
        $games = Game::simplePaginate(8, ['*'], 'games_page', $gamesPage);

        return view('homepage', [
            'products' => $products,
            'games' => $games
        ]);
    }

}

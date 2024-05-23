<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Catalog;
class HomePageController extends Controller
{
    public function index()
    {
        $products = Catalog::simplePaginate(8);
        $games = Game::simplePaginate(8);
        
        return view('homepage', [
            'products' => $products,
            'games' => $games
        ]);
    }

}

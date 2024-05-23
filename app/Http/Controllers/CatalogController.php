<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Game;
class CatalogController extends Controller
{
    public function index()
    {
        $products = Catalog::simplePaginate(10);
        return view('/homepage', compact('products'));
    }

}

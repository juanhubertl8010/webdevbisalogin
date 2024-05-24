<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
class ShopController extends Controller
{
    public function show()
    {
        $catalogItems = Catalog::simplepaginate(9);

        // Pass the catalog items to the view
        return view('shop', ['catalogItems' => $catalogItems]);
    }
}

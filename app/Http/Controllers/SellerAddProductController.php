<?php

namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Catalog;
class SellerAddProductController extends Controller
{
    public function show()
    {
        $games = Game::all();
        return view('SellerAddProduct', compact('games'));
    }

    public function store(Request $request)
    {
        $loggedInUserId = Session::get('loggedInUserId');
        $request->validate([
            'productName' => 'required|string|max:255',
            'productDescription' => 'required|string',
            'harga' => 'required|numeric',
            'game' => 'required|string|exists:games,ID_game',
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        if ($request->hasFile('productImage')) {
            $imageName = time().'.'.$request->productImage->extension();
            $request->productImage->move(public_path('img'), $imageName);
        } else {
            $imageName = null;
        }
        $latestidcatalog = Catalog::max('ID_catalog');
            $newID = 'L' . str_pad((intval(substr($latestidcatalog, 1)) + 1), 4, '0', STR_PAD_LEFT);
        Catalog::create([
            'ID_catalog' => $newID,  // Assuming UUIDs are used for primary key
            'ID_game' => $request->game,
            'ID_user' => $loggedInUserId,// Assuming user is authenticated
            'product_name' => $request->productName,
            'description' => $request->productDescription,
            'harga' => $request->harga,
            'imgproduct' => $imageName,
            'statusdel' => 'F',
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;

class AllwishlistController extends Controller
{
    public function show()
    {
            $wishlistItems = Wishlist::where('wishlist.statusdel', 'F')
            ->join('catalog', function($join) {
                $join->on('wishlist.ID_catalog', '=', 'catalog.ID_catalog')
                    ->where('catalog.statusdel', 'F');
            })
            ->join('user', 'user.ID_user', '=', 'wishlist.ID_User')
            ->select('wishlist.ID_wishlist', 'user.username', 'catalog.product_name', 'catalog.harga')
            ->simplePaginate(10);
    
        
            return view('Allwishlist', compact('wishlistItems'));
           
        } 
}

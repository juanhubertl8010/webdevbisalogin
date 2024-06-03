<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\User;
class AllcartController extends Controller
{
    public function show()
    {
            $cartItems = Keranjang::where('keranjang.statusdel', 'F')
            ->join('catalog', function($join) {
                $join->on('keranjang.ID_catalog', '=', 'catalog.ID_catalog')
                    ->where('catalog.statusdel', 'F');
            })
            ->join('user', 'user.ID_user', '=', 'keranjang.ID_User')
            ->select('keranjang.ID_keranjang', 'user.username', 'catalog.product_name', 'catalog.harga')
            ->simplePaginate(10);
    
        
            return view('Allcart', compact('cartItems'));
           
        } 
}

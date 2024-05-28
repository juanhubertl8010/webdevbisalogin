<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Catalog;

class MyproductController extends Controller
{
    public function show()
    {
        $loggedInUserId = Session::get('loggedInUserId');

        if (!$loggedInUserId) {
            // Handle the case where the user ID is not set in the session
            return redirect()->route('login')->withErrors('Please log in to view your products.');
        }

        $catalogItems = Catalog::where('ID_User', $loggedInUserId)
            ->select('product_name', 'harga', 'imgproduct')
            ->get();
        
        return view('MyproductSeller', compact('catalogItems'));
    } 
}
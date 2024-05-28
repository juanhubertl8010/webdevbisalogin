<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Wishlist;
class WishlistController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            // Get the user ID of the authenticated user
            $userId = Auth::id();
    
            // Check if the user has any wishlist items
            $wishlistItems = Wishlist::where('wishlist.ID_User', $userId)->exists();
    
            if($wishlistItems) {
                // Fetch wishlist items for the authenticated user
                $wishlistItems = Wishlist::where('wishlist.ID_User', $userId)
                    ->join('catalog', 'wishlist.ID_catalog', '=', 'catalog.ID_catalog')
                    ->select('catalog.product_name', 'catalog.harga', 'catalog.imgproduct')
                    ->get();
    
                // Store the current username in the session to display it in the view
                return view('wishlist', compact('wishlistItems'));
            } else {
                // If the user has no wishlist items, you can handle it accordingly
                return redirect()->route('wishlist.empty')->with('warning', 'Your wishlist is empty.');
            }
        } else {
            // User is not authenticated, redirect to login or handle accordingly
            return redirect()->route('login')->with('error', 'You need to login to view your wishlist.');
        }
    }
//     public function show()
//     {
//         // Retrieve the authenticated user's ID from the session
//     $loggedInUserId = Session::get('loggedInUserId');

//     if ($loggedInUserId) {
//         // Check if the user has any wishlist items
//         $wishlistItems = Wishlist::where('wishlist.ID_User', $loggedInUserId)->exists();

//         if($wishlistItems) {
//             // Fetch wishlist items for the authenticated user
//             $wishlistItems = Wishlist::where('wishlist.ID_User', $loggedInUserId)
//                 ->join('catalog', 'wishlist.ID_catalog', '=', 'catalog.ID_catalog')
//                 ->select('catalog.product_name', 'catalog.harga', 'catalog.imgproduct')
//                 ->get();

//             // Store the current username in the session to display it in the view
//             return view('wishlist', compact('wishlistItems'));
//         } else {
//             // If the user has no wishlist items, you can handle it accordingly
//             return redirect()->route('wishlist.empty')->with('warning', 'Your wishlist is empty.');
//         }
//     } else {
//         // If the user is not logged in or session expired, redirect to login page
//         return redirect()->route('login')->with('error', 'You need to login to view your wishlist.');
//     }
// }
}
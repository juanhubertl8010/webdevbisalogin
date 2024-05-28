<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Wishlist;
use App\Models\User;
class WishlistController extends Controller
{
  
    public function show()
    {
        if (Auth::check()) {
            // Get the username from the session
            $username = Session::get('last_logged_in_username');
    
            // Check if user ID is already stored in the session
            if (!Session::has('loggedInUserId')) {
                // Fetch the user ID based on the username
                $user = User::where('username', $username)->first();
                
                if ($user) {
                    $userId = $user->ID_user;
                    // Store the user ID in the session
                    Session::put('loggedInUserId', $userId);
                } else {
                    // If no user is found with the given username, handle accordingly
                    return redirect()->route('login')->with('error', 'User not found. Please log in again.');
                }
            } else {
                // Get the user ID from the session
                $userId = Session::get('loggedInUserId');
            }
    
            // Get the user ID and username from the users table
            $userData = User::select('ID_user', 'username')->where('ID_user', $userId)->first();
    
            // Check if the user has any wishlist items
            $wishlistExists = Wishlist::where('wishlist.ID_user', $userId)->exists();
    
            if ($wishlistExists) {
                // Fetch wishlist items for the authenticated user
                $wishlistItems = Wishlist::where('wishlist.ID_user', $userId)
                    ->join('catalog', 'wishlist.ID_catalog', '=', 'catalog.ID_catalog')
                    ->select('catalog.product_name', 'catalog.harga', 'catalog.imgproduct')
                    ->get();
    
                // Pass the wishlist items, user ID, and username to the view
                return view('wishlist', compact('wishlistItems', 'userData'));
            } else {
                // If the user has no wishlist items, handle accordingly
                return redirect()->route('wishlist.empty')->with('warning', 'Your wishlist is empty.');
            }
        } else {
            // User is not authenticated, redirect to login or handle accordingly
            return redirect()->route('login')->with('error', 'You need to login to view your wishlist.');
        }
    }
}
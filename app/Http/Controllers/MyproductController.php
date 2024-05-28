<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Catalog;
use Illuminate\Http\Request;
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
        ->where('statusdel', 'F')
            ->select('ID_catalog','product_name', 'harga', 'imgproduct')
            ->get();
        
        return view('MyproductSeller', compact('catalogItems'));
    } 
    public function remove(Request $request)
{
    // Ambil ID wishlist dari request
    $ID_catalog = $request->ID_catalog;

    // Periksa apakah item wishlist yang ingin dihapus dimiliki oleh pengguna yang sedang login
    $catalog = Catalog::where('ID_catalog', $ID_catalog)->first();
    $updated = Catalog::where('ID_catalog', $ID_catalog)
 ->update(['statusdel' => 'T']);
    if ($updated) {
        // Logging sebelum melakukan update
        return redirect()->back()->with('success', 'Item removed from catalog.');
    } else {
        return redirect()->back()->with('error', 'Failed to remove item from catalog.');
    }
    
    }
}
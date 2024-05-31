<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Catalog; // Import model Catalog
use App\Models\Keranjang;
use App\Models\Review;
class DetailController extends Controller
{
    public function show($id_catalog)
    {
        $product = Catalog::where('ID_catalog', $id_catalog)->first();
        $reviews = Review::where('ID_catalog', $id_catalog)->with('user')->get();

        if ($product) {
            return view('detail', compact('product', 'reviews'));
        } else {
            abort(404);
        }
    }

    public function add(Request $request)
    {
        $loggedInUserId = Session::get('loggedInUserId');
        if (is_null($loggedInUserId)) {
            return redirect()->back()->with('error', 'You need to be logged in to add to cart.');
        }
        
        $request->validate([
            'ID_catalog' => 'required|exists:catalog,ID_catalog',
        ]);
        
        $exists = Keranjang::where('ID_User', $loggedInUserId)
            ->where('statusdel', 'F')
            ->where('ID_catalog', $request->ID_catalog)
            ->exists();
        
        if (!$exists) {
            $latestidkeranjang = Keranjang::max('ID_keranjang');
            $newID = 'K' . str_pad((intval(substr($latestidkeranjang, 1)) + 1), 4, '0', STR_PAD_LEFT);
        
            Keranjang::create([
                'ID_keranjang' => $newID,
                'ID_user' => $loggedInUserId,
                'ID_catalog' => $request->ID_catalog,
            ]);
        }
        
        return redirect()->back()->with('success', 'Item added to cart.');
    }

    public function addReview(Request $request, $id_catalog)
    {
        $loggedInUserId = Session::get('loggedInUserId');
        if (is_null($loggedInUserId)) {
            return redirect()->back()->with('error', 'You need to be logged in to leave a review.');
        }

        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'review_text' => 'required|string',
        ]);

        $latestReviewId = Review::max('ID_review');
        $newReviewId = 'R' . str_pad((intval(substr($latestReviewId, 1)) + 1), 4, '0', STR_PAD_LEFT);

        Review::create([
            'ID_review' => $newReviewId,
            'ID_user' => $loggedInUserId,
            'ID_catalog' => $id_catalog,
            'review_date' => now(),
            'rating' => $request->rating,
            'review_text' => $request->review_text,
        ]);

        return redirect()->back()->with('success', 'Review added successfully.');
    }
}

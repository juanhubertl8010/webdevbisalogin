<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Catalog;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class MyOrderController extends Controller
{
    public function index()
    {
        $loggedInUserId = Session::get('loggedInUserId');
        
        $catalogItems = Transaksi::where('catalog.ID_user', $loggedInUserId)
            ->where('transaksi.statusbyr', 'T')
            ->join('catalog', 'transaksi.ID_catalog', '=', 'catalog.ID_catalog')
            ->join('user', 'transaksi.ID_user', '=', 'user.ID_user')
            ->select('catalog.*', 'user.username as buyer_username', 'transaksi.harga as transaksi_harga', 'transaksi.deskripsi as transaksi_deskripsi', 'transaksi.statustrans', 'transaksi.ID_transaksi')
            ->simplePaginate(5);
        
        return view('myorder', compact('catalogItems'));
    }
    
    public function updateStatus($id)
    {
        $updated = DB::table('transaksi')
        ->where('ID_transaksi', $id)
        ->update(['statustrans' => 'T']);

if ($updated) {
// Redirect back to the myorder route with a success message
return redirect()->route('myorder')->with('success', 'Status updated successfully');
} else {
// If the update fails, return with an error message
return redirect()->route('myorder')->with('error', 'Status update failed');
}
    }
}
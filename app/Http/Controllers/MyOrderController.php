<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Catalog;
use App\Models\Transaksi;
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
            ->select('catalog.*', 'user.username as buyer_username', 'transaksi.harga as transaksi_harga','transaksi.deskripsi as transaksi_deskripsi')
            ->simplePaginate(5);
        
        return view('myorder', compact('catalogItems'));
    }
}
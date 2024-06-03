<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;

class AllTransController extends Controller
{
    public function show()
    {
        $transItems = Transaksi::where(function($query) {
            $query->where('transaksi.statusdel', 'F')
                  ->orWhere('transaksi.statusdel', 'T');
        })
        ->join('catalog', function($join) {
            $join->on('transaksi.ID_catalog', '=', 'catalog.ID_catalog')
                ->where('catalog.statusdel', 'F');
        })
        ->join('user', 'user.ID_user', '=', 'transaksi.ID_User')
        ->select('transaksi.ID_transaksi', 'user.username', 'catalog.product_name', 'catalog.harga')
        ->simplePaginate(10);
        
        return view('AllTrans', compact('transItems'));
        } 
}

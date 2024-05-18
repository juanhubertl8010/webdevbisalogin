<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmintableController extends Controller
{
    public function show()
    {
        return view('admintables-general');
    }
}

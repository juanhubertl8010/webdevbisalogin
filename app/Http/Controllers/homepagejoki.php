<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepagejoki extends Controller
{
    public function show()
    {
        return view('HomePageJoki');
    }
}
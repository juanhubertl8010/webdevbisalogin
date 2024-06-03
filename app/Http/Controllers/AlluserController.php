<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AlluserController extends Controller
{
    public function index()
    {
        $userItems = User::where('statusdel', false)
        ->select('ID_user', 'username', 'user_role', 'email')
        ->simplePaginate(10);


        return view('AllUser', compact('userItems'));
    }
}

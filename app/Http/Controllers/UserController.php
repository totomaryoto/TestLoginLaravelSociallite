<?php

namespace App\Http\Controllers;

use Auth;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user', [
            'user' => Auth::user(),
        ]);
    }
}

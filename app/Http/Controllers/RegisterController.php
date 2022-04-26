<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    //

    public function index()
    {
        return view('register.index', [
            'title' => 'Daftar'
        ]);
    }

    public function store(Request $request)
    {

        // return $request->all();
        $validatedDate = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:2|max:100'
        ]);

        User::create($validatedDate);
        // $request->session()->flash('success', 'Pendaftaran Berhasil! silahkan login');
        return redirect('login')->with('status', 'Pendaftaran Berhasil! silahkan login!');
        // return redirect('/login');
    }
}

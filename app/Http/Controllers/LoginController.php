<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // return $request->all();

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'

        ]);


        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            // return redirect()->intended('/user');
            Auth::login($credentials);
            return redirect('user');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }

        return back()->with('loginError', 'login failed');
    }
}

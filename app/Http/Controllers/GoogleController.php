<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->email)->first();
            if ($user) {
                Auth::login($user);
                return redirect('user');
            } else {

                // die("<script>

                // alert('" . ucwords($google_user->email) . "');
                // </script>");


                $new_user = ([
                    'name' => ucwords($google_user->name),
                    'email' => $google_user->email,
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),

                ]);


                Auth::login($new_user);
                return redirect('user');
            }
        } catch (\Throwable $th) {
            abort(404);
        }
    }
    //   'remember_token' => Str::random(10),

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

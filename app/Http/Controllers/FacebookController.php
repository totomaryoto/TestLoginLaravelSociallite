<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Str;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    //
    public function loginfb()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackfb()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->user();
            $user = User::where('email', $facebook_user->email)->first();
            if ($user) {
                Auth::login($user);
                return redirect('user');
            } else {
                $new_user = User::create([
                    'name' => ucwords($facebook_user->name),
                    'email' => $facebook_user->email,
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

    public function logoutfb()
    {
        Auth::logout();
        return redirect('/');
    }
}

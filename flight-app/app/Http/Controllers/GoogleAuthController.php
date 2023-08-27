<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Exception;

class GoogleAuthController
{


    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $user = User::updateOrCreate([
            'provider_id' => $user->id,
            'provider' => 'google',
        ], [
            'name' => $user->name,
            'email' => $user->email,
            'provider_token' => $user->token,
        ]);

        Auth::login($user);
        if (Auth::check()) {
            return redirect('/');
        } else {
            return redirect('/login')->with('error', 'Authentication failed');
        }

    }
}

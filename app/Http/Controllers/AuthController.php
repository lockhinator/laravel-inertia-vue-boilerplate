<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        // because of inertia we need to grab the url and pass it in the header
        // without this you will not get the redirect! Thanks inertia!
        $redirectUrl = Socialite::driver('google')->redirect()->getTargetUrl();
        return Inertia::location($redirectUrl);
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
        'google_id' => $googleUser->id,
      ], [
        'email' => $googleUser->email,
        'name' => $googleUser->name,
        'password' => sha1(Str::random(32)), // set a random password for the user
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
      ]);

        if (is_null($user->email_verified_at)) {
            $user->email_verified_at = Carbon::now();
            $user->save();
            $user->refresh();
        }

        Auth::login($user);

        return redirect('/dashboard');
    }
}

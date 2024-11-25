<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // Check if user exists
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                // Create a new user
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(uniqid()), // Random password
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                ]);
            }

            // Log the user in
            Auth::login($user);

            return redirect('/dashboard'); // Redirect to dashboard or home
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Unable to login, please try again.']);
        }
    }
}

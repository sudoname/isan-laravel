<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    /**
     * Redirect to social provider
     */
    public function redirectToProvider($provider)
    {
        // Validate provider
        if (!in_array($provider, ['google', 'facebook', 'instagram'])) {
            return redirect()->route('login')->with('error', 'Invalid social provider.');
        }

        try {
            return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Unable to connect to ' . ucfirst($provider) . '. Please try again or use email login.');
        }
    }

    /**
     * Handle callback from social provider
     */
    public function handleProviderCallback($provider)
    {
        // Validate provider
        if (!in_array($provider, ['google', 'facebook', 'instagram'])) {
            return redirect()->route('login')->with('error', 'Invalid social provider.');
        }

        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Failed to authenticate with ' . ucfirst($provider) . '. Please try again.');
        }

        // Check if user exists by email
        $user = User::where('email', $socialUser->getEmail())->first();

        if ($user) {
            // User exists - update provider info if needed
            if (!$user->provider || $user->provider !== $provider) {
                $user->update([
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => $socialUser->token,
                    'is_email_verified' => true, // Social logins are pre-verified
                ]);
            }
        } else {
            // Create new user
            $user = User::create([
                'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User',
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'provider_token' => $socialUser->token,
                'password' => Hash::make(Str::random(24)), // Random password for social users
                'is_email_verified' => true, // Social logins are pre-verified
                'avatar' => $socialUser->getAvatar(),
            ]);
        }

        // Login the user
        Auth::login($user, true);

        return redirect()->intended('/dashboard')
            ->with('success', 'Successfully logged in with ' . ucfirst($provider) . '!');
    }
}

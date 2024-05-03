<?php

namespace Ecommerce\Base\Auth\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class GoogleAuthController extends Controller
{
    /**
     * @return \Laravel\Socialite\Contracts\Provider
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callbackGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->getId())->first();

            if (!$user) {
                // Create a new user if not found
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId()
                ]);

                Auth::login($newUser);

                toastr()->success('Logged in with Google Account successfully!');

                return redirect()->intended('/user/dashboard');
            } else {
                // Login existing user
                Auth::login($user);

                toastr()->success('Logged in with Google Account successfully!');

                return redirect()->intended('/user/dashboard');
            }
        } catch (\Throwable $th) {
            // Log the error
            logger()->error('Google OAuth callback error: ' . $th->getMessage());

            // Redirect back with an error message
            toastr()->error('Something went wrong during Google OAuth authentication.');

            return redirect()->back()->withInput();
        }
    }
}

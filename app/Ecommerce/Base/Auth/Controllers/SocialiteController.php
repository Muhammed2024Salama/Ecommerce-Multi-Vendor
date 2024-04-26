<?php

namespace Ecommerce\Base\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback()
    {
        $socialUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            ['email' => $socialUser->email],
            [
                'name' => $socialUser->name,
                'password' => bcrypt(Str::random(24))
            ]
        );

        Auth::login($user, true);

        toastr()->success('Logged in with GitHub Account successfully!');

        return redirect('/user/dashboard');
    }
}

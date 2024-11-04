<?php

namespace App\Ecommerce\Base\Auth\Repository;

use App\Ecommerce\Base\Auth\Interface\SocialAuthInterface;
use Ecommerce\Frontend\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthRepository implements SocialAuthInterface
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

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

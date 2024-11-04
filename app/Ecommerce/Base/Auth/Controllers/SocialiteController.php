<?php

namespace Ecommerce\Base\Auth\Controllers;

use App\Ecommerce\Base\Auth\Interface\SocialAuthInterface;
use App\Http\Controllers\Controller;
use Ecommerce\Frontend\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * @var SocialAuthInterface
     */
    protected $socialAuthRepository;

    /**
     * @param SocialAuthInterface $socialAuthRepository
     */
    public function __construct(SocialAuthInterface $socialAuthRepository)
    {
        $this->socialAuthRepository = $socialAuthRepository;
    }

    /**
     * @return mixed
     */
    public function redirectToProvider()
    {
        return $this->socialAuthRepository->redirectToProvider();
    }

    /**
     * @return mixed
     */
    public function handleProviderCallback()
    {
        return $this->socialAuthRepository->handleProviderCallback();
    }
}

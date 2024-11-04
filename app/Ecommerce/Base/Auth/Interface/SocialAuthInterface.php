<?php

namespace App\Ecommerce\Base\Auth\Interface;

interface SocialAuthInterface
{
    /**
     * @return mixed
     */
    public function redirectToProvider();

    /**
     * @return mixed
     */
    public function handleProviderCallback();
}

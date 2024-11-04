<?php

namespace Ecommerce\Backend\Controllers\Admin\About\Repository;

use Ecommerce\Backend\Controllers\Admin\About\Interface\AboutRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\About\Models\About;

class AboutRepository implements AboutRepositoryInterface
{
    /**
     * @return About|null
     */
    public function getFirst(): ?About
    {
        return About::first();
    }

    /**
     * @param array $attributes
     * @param array $values
     * @return About
     */
    public function updateOrCreate(array $attributes, array $values): About
    {
        return About::updateOrCreate($attributes, $values);
    }
}

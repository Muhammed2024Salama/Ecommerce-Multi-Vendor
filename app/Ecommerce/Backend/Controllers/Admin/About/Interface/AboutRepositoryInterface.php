<?php

namespace Ecommerce\Backend\Controllers\Admin\About\Interface;

use Ecommerce\Backend\Controllers\Admin\About\Models\About;

interface AboutRepositoryInterface
{
    /**
     * @return About|null
     */
    public function getFirst(): ?About;

    /**
     * @param array $attributes
     * @param array $values
     * @return About
     */
    public function updateOrCreate(array $attributes, array $values): About;
}

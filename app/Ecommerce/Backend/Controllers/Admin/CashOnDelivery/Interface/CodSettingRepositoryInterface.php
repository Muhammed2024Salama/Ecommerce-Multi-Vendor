<?php

namespace Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Interface;

interface CodSettingRepositoryInterface
{
    /**
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values);
}

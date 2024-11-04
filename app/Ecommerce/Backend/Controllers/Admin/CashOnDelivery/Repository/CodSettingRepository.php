<?php

namespace Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Repository;


use Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Interface\CodSettingRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Models\CodSetting;

class CodSettingRepository implements CodSettingRepositoryInterface
{
    /**
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values)
    {
        return CodSetting::updateOrCreate($attributes, $values);
    }
}

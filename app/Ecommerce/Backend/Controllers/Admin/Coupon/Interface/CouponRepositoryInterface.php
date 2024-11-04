<?php

namespace Ecommerce\Backend\Controllers\Admin\Coupon\Interface;

use Illuminate\Http\Request;
use Ecommerce\Backend\Controllers\Admin\Coupon\Requests\StoreCouponRequest;
use Ecommerce\Backend\Controllers\Admin\Coupon\Requests\UpdateCouponRequest;

interface CouponRepositoryInterface
{
    public function getAllCoupons();
    public function createCoupon();
    public function storeCoupon(StoreCouponRequest $request);
    public function editCoupon(string $id);
    public function updateCoupon(UpdateCouponRequest $request, string $id);
    public function deleteCoupon(string $id);
    public function changeCouponStatus(Request $request);
}

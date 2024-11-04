<?php

namespace Ecommerce\Backend\Controllers\Admin\Coupon\Controllers;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Coupon\Interface\CouponRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Coupon\Models\Coupon;
use Ecommerce\Backend\Controllers\Admin\Coupon\Requests\StoreCouponRequest;
use Ecommerce\Backend\Controllers\Admin\Coupon\Requests\UpdateCouponRequest;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * @var CouponRepositoryInterface
     */
    protected $couponRepository;

    /**
     * @param CouponRepositoryInterface $couponRepository
     */
    public function __construct(CouponRepositoryInterface $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTable)
    {
        return $this->couponRepository->getAllCoupons();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->couponRepository->createCoupon();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
        return $this->couponRepository->storeCoupon($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->couponRepository->editCoupon($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, string $id)
    {
        return $this->couponRepository->updateCoupon($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->couponRepository->deleteCoupon($id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function changeStatus(Request $request)
    {
        return $this->couponRepository->changeCouponStatus($request);
    }
}

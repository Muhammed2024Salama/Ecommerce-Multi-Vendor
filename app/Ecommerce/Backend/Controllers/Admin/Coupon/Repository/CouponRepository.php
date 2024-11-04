<?php

namespace Ecommerce\Backend\Controllers\Admin\Coupon\Repository;

use App\DataTables\CouponDataTable;
use Ecommerce\Backend\Controllers\Admin\Coupon\Interface\CouponRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Coupon\Models\Coupon;
use Ecommerce\Backend\Controllers\Admin\Coupon\Requests\StoreCouponRequest;
use Ecommerce\Backend\Controllers\Admin\Coupon\Requests\UpdateCouponRequest;
use Illuminate\Http\Request;

class CouponRepository implements CouponRepositoryInterface
{
    public function getAllCoupons()
    {
        return (new CouponDataTable())->render('admin.coupon.index');
    }

    public function createCoupon()
    {
        return view('admin.coupon.create');
    }

    public function storeCoupon(StoreCouponRequest $request)
    {
        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->max_use = $request->max_use;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->total_used = 0;
        $coupon->status = $request->status;
        $coupon->save();

        toastr('Created Successfully', 'success', 'Success');

        return redirect()->route('admin.coupons.index');
    }

    public function editCoupon(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function updateCoupon(UpdateCouponRequest $request, string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->max_use = $request->max_use;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->status = $request->status;
        $coupon->save();

        toastr('Updated Successfully', 'success', 'Success');

        return redirect()->route('admin.coupons.index');
    }

    public function deleteCoupon(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeCouponStatus(Request $request)
    {
        $coupon = Coupon::findOrFail($request->id);
        $coupon->status = $request->status == 'true' ? 1 : 0;
        $coupon->save();

        return response(['message' => 'Status has been updated!']);
    }
}

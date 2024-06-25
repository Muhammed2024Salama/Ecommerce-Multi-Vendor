<?php

namespace Ecommerce\Backend\Controllers\Admin\Razorpay\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ecommerce\Backend\Controllers\Admin\Razorpay\Models\RazorpaySetting;

class RazorpaySettingController extends Controller
{
    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        /** Start Validation */
        $request->validate([
            'status' => ['required', 'integer'],
            'country_name' => ['required', 'max:200'],
            'currency_name' => ['required', 'max:200'],
            'currency_rate' => ['required'],
            'razorpay_key' => ['required'],
            'razorpay_secret_key' => ['required']
        ]);
        /** End Validation */

        RazorpaySetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
                'country_name' => $request->country_name,
                'currency_name' => $request->currency_name,
                'currency_rate' => $request->currency_rate,
                'razorpay_key' => $request->razorpay_key,
                'razorpay_secret_key' => $request->razorpay_secret_key,
            ]
        );

        toastr('Updated Successfully!', 'success', 'Success');
        return redirect()->back();
    }
}

<?php

namespace Ecommerce\Backend\Controllers\Admin\Payment\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Paypal\Models\PaypalSetting;
use Ecommerce\Backend\Controllers\Admin\Stripe\Models\StripeSetting;

class PaymentSettingController extends Controller
{
    public function index()
    {

        $paypalSetting = PaypalSetting::first();
        $stripeSetting = StripeSetting::first();
        $razorpaySetting = RazorpaySetting::first();
        $codSetting = CodSetting::first();


        return view('admin.payment-settings.index', compact('paypalSetting', 'stripeSetting', 'razorpaySetting', 'codSetting'));
    }
}

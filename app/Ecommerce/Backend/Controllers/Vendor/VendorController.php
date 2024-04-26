<?php

namespace Ecommerce\Backend\Controllers\Vendor;

use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function dashboard()
    {
        return view('vendor.dashboard.dashboard');
    }
}

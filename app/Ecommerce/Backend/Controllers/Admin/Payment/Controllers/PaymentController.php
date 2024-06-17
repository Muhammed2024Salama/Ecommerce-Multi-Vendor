<?php

namespace Ecommerce\Backend\Controllers\Admin\Payment\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if(!Session::has('address')){
            return redirect()->route('user.checkout');
        }
        return view('frontend.pages.payment');
    }
}

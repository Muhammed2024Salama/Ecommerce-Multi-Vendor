<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\VendorCondition\Models\VendorCondition;
use Ecommerce\Backend\Controllers\Vendor\Models\Vendor;
use Ecommerce\Base\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVendorReqeustController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $content = VendorCondition::first();
        return view('frontend.dashboard.vendor-request.index', compact('content'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        /** Start Validation */
        $request->validate([
            'shop_image' => ['required', 'image', 'max:3000'],
            'shop_name' => ['required', 'max:200'],
            'shop_email' => ['required', 'email'],
            'shop_phone' => ['required', 'max:200'],
            'shop_address' => ['required'],
            'about' => ['required']
        ]);
        /** End Validation */

        if(Auth::user()->role === 'vendor'){
            return redirect()->back();
        }

        $imagePath = $this->uploadImage($request, 'shop_image', 'uploads');


        $vendor = new Vendor();

        $vendor->banner = $imagePath;
        $vendor->phone = $request->shop_phone;
        $vendor->email = $request->shop_email;
        $vendor->address = $request->shop_address;
        $vendor->description = $request->about;
        $vendor->shop_name = $request->shop_name;
        $vendor->user_id = Auth::user()->id;
        $vendor->status = 0;

        $vendor->save();

        toastr('Submitted successfully please wait for approve!', 'success', 'success');

        return redirect()->back();
    }
}

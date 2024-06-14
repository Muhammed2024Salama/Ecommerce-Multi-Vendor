<?php

namespace Ecommerce\Backend\Controllers\Admin\Settings\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Settings\Models\GeneralSetting;
use Ecommerce\Base\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $generalSettings = GeneralSetting::first();

        return view('admin.setting.index', compact('generalSettings'));
    }


    public function generalSettingUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'site_name' => ['required', 'max:200'],
            'layout' => ['required', 'max:200'],
            'contact_email' => ['required', 'max:200'],
            'currency_name' => ['required', 'max:200'],
            'time_zone' => ['required', 'max:200'],
            'currency_icon' => ['required', 'max:200'],
        ]);

        GeneralSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => $request->site_name,
                'layout' => $request->layout,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
                'contact_address' => $request->contact_address,
                'map' => $request->map,
                'currency_name' => $request->currency_name,
                'currency_icon' => $request->currency_icon,
                'time_zone' => $request->time_zone
            ]
        );

        toastr('Updated successfully!', 'success', 'Success');

        return redirect()->back();

    }
}

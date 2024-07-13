<?php

namespace Ecommerce\Backend\Controllers\Admin\Settings\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\EmailConfiguration\Models\EmailConfiguration;
use Ecommerce\Backend\Controllers\Admin\LogoSetting\Models\LogoSetting;
use Ecommerce\Backend\Controllers\Admin\Pusher\Models\PusherSetting;
use Ecommerce\Backend\Controllers\Admin\Settings\Models\GeneralSetting;
use Ecommerce\Base\Traits\ImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageUploadTrait;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        $emailSettings = EmailConfiguration::first();
        $logoSetting = LogoSetting::first();
        $pusherSetting = PusherSetting::first();
        return view('admin.setting.index', compact('generalSettings', 'emailSettings', 'logoSetting', 'pusherSetting'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function generalSettingUpdate(Request $request)
    {
        // dd($request->all());
        /** Start Validation */

        $request->validate([
            'site_name' => ['required', 'max:200'],
            'layout' => ['required', 'max:200'],
            'contact_email' => ['required', 'max:200'],
            'currency_name' => ['required', 'max:200'],
            'time_zone' => ['required', 'max:200'],
            'currency_icon' => ['required', 'max:200'],
        ]);

        /** End Validation */


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

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function emailConfigSettingUpdate(Request $request)
    {
        /** Start Validation */
        $request->validate([
            'email' => ['required', 'email'],
            'host' => ['required', 'max:200'],
            'username' => ['required', 'max:200'],
            'password' => ['required', 'max:200'],
            'port' => ['required', 'max:200'],
            'encryption' => ['required', 'max:200'],
        ]);
        /** End Validation */


        EmailConfiguration::updateOrCreate(
            ['id' => 1],
            [
                'email' => $request->email,
                'host' => $request->host,
                'username' => $request->username,
                'password' => $request->password,
                'port' => $request->port,
                'encryption' => $request->encryption,
            ]
        );

        toastr('Updates successfully!', 'success', 'success');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logoSettingUpdate(Request $request)
    {
        /** Start Validation */
        $request->validate([
            'logo' => ['image', 'max:3000'],
            'favicon' => ['image', 'max:3000'],
        ]);
        /** End Validation */

        $logoPath = $this->updateImage($request, 'logo', 'uploads', $request->old_logo);
        $favicon = $this->updateImage($request, 'favicon', 'uploads', $request->old_favicon);

        LogoSetting::updateOrCreate(
            ['id' => 1],
            [
                'logo' =>  (!empty($logoPath)) ? $logoPath : $request->old_logo,
                'favicon' => (!empty($favicon)) ? $favicon : $request->old_favicon
            ]
        );

        toastr('Updated successfully!', 'success', 'success');

        return redirect()->back();
    }


    /** Pusher settings update */
    function pusherSettingUpdate(Request $request) : RedirectResponse {
        /** Start Validate Data */
        $validatedData = $request->validate([
            'pusher_app_id' => ['required'],
            'pusher_key' => ['required'],
            'pusher_secret' => ['required'],
            'pusher_cluster' => ['required'],
        ]);
        /** End Validate Data */

        PusherSetting::updateOrCreate(
            ['id' => 1],
            $validatedData
        );

        toastr('Updated successfully!', 'success', 'success');
        return redirect()->back();

    }
}

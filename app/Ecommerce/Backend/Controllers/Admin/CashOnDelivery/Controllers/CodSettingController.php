<?php

namespace Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Models\CodSetting;
use Illuminate\Http\Request;

class CodSettingController extends Controller
{
    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'integer'],

        ]);

        CodSetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
            ]
        );

        toastr('Updated Successfully!', 'success', 'Success');
        return redirect()->back();
    }
}

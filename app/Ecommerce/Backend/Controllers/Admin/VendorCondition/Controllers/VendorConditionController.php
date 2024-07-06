<?php

namespace Ecommerce\Backend\Controllers\Admin\VendorCondition\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\VendorCondition\Models\VendorCondition;
use Illuminate\Http\Request;

class VendorConditionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $content = VendorCondition::first();
        return view('admin.vendor-condition.index', compact('content'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'content' => ['required']
        ]);

        VendorCondition::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        toastr('updated successfully!', 'success', 'success');

        return redirect()->back();

    }
}

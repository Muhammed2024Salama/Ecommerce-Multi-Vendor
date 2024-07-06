<?php

namespace Ecommerce\Backend\Controllers\Admin\VendorRequest\Controllers;

use App\DataTables\VendorRequestDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Vendor\Models\Vendor;
use Ecommerce\Frontend\Models\User;
use Illuminate\Http\Request;

class VendorRequestController extends Controller
{
    /**
     * @param VendorRequestDataTable $dataTable
     * @return mixed
     */
    public function index(VendorRequestDataTable $dataTable)
    {
        return $dataTable->render('admin.vendor-request.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(string $id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('admin.vendor-request.show', compact('vendor'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus(Request $request, string $id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->status = $request->status;
        $vendor->save();

        $user = User::findOrFail($vendor->user_id);
        $user->role = 'vendor';
        $user->save();

        toastr('Updated successfully!', 'success', 'success');
        return redirect()->route('admin.vendor-requests.index');
    }
}

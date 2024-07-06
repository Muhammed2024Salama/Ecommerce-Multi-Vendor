<?php

namespace Ecommerce\Backend\Controllers\Admin\VendorList\Controllers;

use App\DataTables\VendorListDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Frontend\Models\User;
use Illuminate\Http\Request;

class VendorListController extends Controller
{
    /**
     * @param VendorListDataTable $dataTable
     * @return mixed
     */
    public function index(VendorListDataTable $dataTable)
    {
        return $dataTable->render('admin.vendor-list.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $customer = User::findOrFail($request->id);
        $customer->status = $request->status == 'true' ? 'active' : 'inactive';
        $customer->save();

        return response(['message' => 'Status has been updated!']);
    }
}

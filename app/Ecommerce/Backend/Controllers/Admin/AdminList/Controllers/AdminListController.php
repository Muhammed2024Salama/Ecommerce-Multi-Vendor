<?php

namespace Ecommerce\Backend\Controllers\Admin\AdminList\Controllers;

use App\DataTables\AdminListDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Backend\Controllers\Vendor\Models\Vendor;
use Ecommerce\Frontend\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    /**
     * @param AdminListDataTable $dataTable
     * @return mixed
     */
    public function index(AdminListDataTable $dataTable)
    {
        return $dataTable->render('admin.admin-list.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $admin = User::findOrFail($request->id);
        $admin->status = $request->status == 'true' ? 'active' : 'inactive';
        $admin->save();

        return response(['message' => 'Status has been updated!']);
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function destory(string $id)
    {
        $admin = User::findOrFail($id);

        $products = Product::where('vendor_id', $admin->vendor->id)->get();

        if(count($products) > 0){
            return response(['status' => 'error', 'message' => 'Admin can\'t be deleted please ban the user insted of delete!']);
        }

        Vendor::where('user_id', $admin->id)->delete();
        $admin->delete();

        return response(['status' => 'success', 'message' => 'Deleted successfully']);

    }
}

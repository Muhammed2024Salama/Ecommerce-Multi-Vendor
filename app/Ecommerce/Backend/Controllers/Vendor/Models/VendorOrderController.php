<?php

namespace Ecommerce\Backend\Controllers\Vendor\Models;

use App\DataTables\VendorOrderDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Order\Models\Order;
use Illuminate\Http\Request;

class VendorOrderController extends Controller
{
    /**
     * @param VendorOrderDataTable $dataTable
     * @return mixed
     */
    public function index(VendorOrderDataTable $dataTable)
    {
        return $dataTable->render('vendor.order.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(string $id)
    {
        $order = Order::with(['orderProducts'])->findOrFail($id);
        return view('vendor.order.show', compact('order'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function orderStatus(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = $request->status;
        $order->save();

        toastr('Status Updated Successfully!', 'success', 'Success');

        return redirect()->back();
    }
}

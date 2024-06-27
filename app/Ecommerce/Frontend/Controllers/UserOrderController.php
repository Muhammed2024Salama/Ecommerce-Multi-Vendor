<?php

namespace Ecommerce\Frontend\Controllers;

use App\DataTables\UserOrderDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Order\Models\Order;

class UserOrderController extends Controller
{
    /**
     * @param UserOrderDataTable $dataTable
     * @return mixed
     */
    public function index(UserOrderDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.order.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('frontend.dashboard.order.show', compact('order'));
    }
}

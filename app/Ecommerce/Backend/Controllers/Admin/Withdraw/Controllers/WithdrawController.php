<?php

namespace Ecommerce\Backend\Controllers\Admin\Withdraw\Controllers;

use App\DataTables\WithdrawRequestDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Vendor\Models\WithdrawRequest;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * @param WithdrawRequestDataTable $dataTable
     * @return mixed
     */
    function index(WithdrawRequestDataTable $dataTable) {
        return $dataTable->render('admin.withdraw.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    function show(string $id) {
        $request = WithdrawRequest::findOrFail($id);
        return view('admin.withdraw.show', compact('request'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(Request $request, string $id) {
        $request->validate([
            'status' => ['required', 'in:pending,paid,declined']
        ]);

        $withdraw = WithdrawRequest::findOrFail($id);
        $withdraw->status = $request->status;
        $withdraw->save();

        toastr('Updated successfully!');

        return redirect()->route('admin.withdraw.index');
    }
}

<?php

namespace Ecommerce\Backend\Controllers\Admin\Transaction\Controllers;

use App\DataTables\TransactionDataTable;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * @param TransactionDataTable $dataTable
     * @return mixed
     */
    public function index(TransactionDataTable $dataTable)
    {
        return $dataTable->render('admin.transaction.index');
    }
}

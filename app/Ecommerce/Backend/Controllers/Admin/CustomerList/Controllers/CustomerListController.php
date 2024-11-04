<?php

namespace Ecommerce\Backend\Controllers\Admin\CustomerList\Controllers;

use App\DataTables\CustomerListDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\CustomerList\Interface\CustomerListRepositoryInterface;
use Ecommerce\Frontend\Models\User;
use Illuminate\Http\Request;

class CustomerListController extends Controller
{
    protected $customerListRepository;

    public function __construct(CustomerListRepositoryInterface $customerListRepository)
    {
        $this->customerListRepository = $customerListRepository;
    }

    /**
     * @param CustomerListDataTable $dataTable
     * @return mixed
     */
    public function index(CustomerListDataTable $dataTable)
    {
        return $dataTable->render('admin.customer-list.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $customer = $this->customerListRepository->getUserById($request->id);
        $this->customerListRepository->updateUserStatus($customer, $request->status);

        return response(['message' => 'Status has been updated!']);
    }
}

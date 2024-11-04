<?php

namespace Ecommerce\Backend\Controllers\Admin\AdminList\Controllers;

use App\DataTables\AdminListDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\AdminList\Interface\AdminListRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Backend\Controllers\Vendor\Models\Vendor;
use Ecommerce\Frontend\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    protected $adminListRepository;

    public function __construct(AdminListRepositoryInterface $adminListRepository)
    {
        $this->adminListRepository = $adminListRepository;
    }

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
        $admin = $this->adminListRepository->getUserById($request->id);
        $this->adminListRepository->updateUserStatus($admin, $request->status);

        return response(['message' => 'Status has been updated!']);
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $admin = $this->adminListRepository->getUserById($id);
        $products = $this->adminListRepository->getProductsByVendorId($admin->vendor->id);

        if (count($products) > 0) {
            return response(['status' => 'error', 'message' => 'Admin can\'t be deleted please ban the user instead of delete!']);
        }

        $this->adminListRepository->deleteVendorByUserId($admin->id);
        $this->adminListRepository->deleteUser($admin);

        return response(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}

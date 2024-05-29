<?php

namespace Ecommerce\Backend\Controllers\Admin\Product\Controllers;

use App\DataTables\SellerPendingProductsDataTable;
use App\DataTables\SellerProductsDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Illuminate\Http\Request;

class SellerProductController extends Controller
{
    /**
     * @param SellerProductsDataTable $dataTable
     * @return mixed
     */
    public function index(SellerProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.product.seller-product.index');
    }

    /**
     * @param SellerPendingProductsDataTable $dataTable
     * @return mixed
     */
    public function pendingProducts(SellerPendingProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.product.seller-pending-product.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function changeApproveStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->is_approved = $request->value;
        $product->save();

        return response(['message' => 'Product Approve Status Has Been Changed']);
    }
}

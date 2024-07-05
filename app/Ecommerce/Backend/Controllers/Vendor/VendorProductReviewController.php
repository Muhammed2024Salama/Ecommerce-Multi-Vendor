<?php

namespace Ecommerce\Backend\Controllers\Vendor;

use App\DataTables\VendorProductReviewsDataTable;
use App\Http\Controllers\Controller;

class VendorProductReviewController extends Controller
{
    /**
     * @param VendorProductReviewsDataTable $dataTable
     * @return mixed
     */
    public function index(VendorProductReviewsDataTable $dataTable)
    {
        return $dataTable->render('vendor.review.index');
    }
}

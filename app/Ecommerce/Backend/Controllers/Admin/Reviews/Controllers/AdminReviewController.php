<?php

namespace Ecommerce\Backend\Controllers\Admin\Reviews\Controllers;

use App\DataTables\AdminReviewDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Reviews\Models\ProductReview;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    /**
     * @param AdminReviewDataTable $dataTable
     * @return mixed
     */
    public function index(AdminReviewDataTable $dataTable)
    {
        return $dataTable->render('admin.product.review.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $review = ProductReview::findOrFail($request->id);
        $review->status = $request->status == 'true' ? 1 : 0;
        $review->save();

        return response(['message' => 'Status has been updated!']);
    }
}

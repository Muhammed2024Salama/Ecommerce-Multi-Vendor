<?php

namespace Ecommerce\Backend\Controllers\Admin\ChildCategory\Controllers;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Category\Models\Category;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Interface\ChildCategoryRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Models\ChildCategory;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Requests\StoreChildCategoryRequest;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Requests\UpdateChildCategoryRequest;
use Ecommerce\Backend\Controllers\Admin\HomePage\Models\HomePageSetting;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Backend\Controllers\Admin\SubCategory\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * @var ChildCategoryRepositoryInterface
     */
    protected $childCategoryRepository;

    /**
     * @param ChildCategoryRepositoryInterface $childCategoryRepository
     */
    public function __construct(ChildCategoryRepositoryInterface $childCategoryRepository)
    {
        $this->childCategoryRepository = $childCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $this->childCategoryRepository->getAllChildCategories();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->childCategoryRepository->createChildCategory();
    }

    /**
     * Get sub categories
     */
    public function getSubCategories(Request $request)
    {
        return $this->childCategoryRepository->getSubCategories($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChildCategoryRequest $request)
    {
        return $this->childCategoryRepository->storeChildCategory($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->childCategoryRepository->editChildCategory($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChildCategoryRequest $request, string $id)
    {
        return $this->childCategoryRepository->updateChildCategory($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->childCategoryRepository->deleteChildCategory($id);
    }

    public function changeStatus(Request $request)
    {
        return $this->childCategoryRepository->changeChildCategoryStatus($request);
    }
}

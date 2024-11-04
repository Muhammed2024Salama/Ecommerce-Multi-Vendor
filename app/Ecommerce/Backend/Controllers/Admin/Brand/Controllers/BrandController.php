<?php

namespace Ecommerce\Backend\Controllers\Admin\Brand\Controllers;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Brand\Interface\BrandRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Brand\Models\Brand;
use Ecommerce\Backend\Controllers\Admin\Brand\Requests\StoreBrandRequest;
use Ecommerce\Backend\Controllers\Admin\Brand\Requests\UpdateBrandRequest;
use Ecommerce\Backend\Controllers\Admin\Category\Models\Category;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Base\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    protected $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->brandRepository->getAllBrands();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->brandRepository->createBrand();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        return $this->brandRepository->storeBrand($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->brandRepository->editBrand($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $id)
    {
        return $this->brandRepository->updateBrand($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->brandRepository->deleteBrand($id);
    }

    public function changeStatus(Request $request)
    {
        return $this->brandRepository->changeBrandStatus($request);
    }
}

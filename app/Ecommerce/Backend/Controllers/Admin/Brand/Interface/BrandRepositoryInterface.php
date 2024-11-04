<?php

namespace Ecommerce\Backend\Controllers\Admin\Brand\Interface;

use Illuminate\Http\Request;
use Ecommerce\Backend\Controllers\Admin\Brand\Requests\StoreBrandRequest;
use Ecommerce\Backend\Controllers\Admin\Brand\Requests\UpdateBrandRequest;

interface BrandRepositoryInterface
{
    public function getAllBrands();
    public function createBrand();
    public function storeBrand(StoreBrandRequest $request);
    public function editBrand(string $id);
    public function updateBrand(UpdateBrandRequest $request, string $id);
    public function deleteBrand(string $id);
    public function changeBrandStatus(Request $request);
}

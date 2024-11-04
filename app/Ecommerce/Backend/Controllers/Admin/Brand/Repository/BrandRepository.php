<?php

namespace Ecommerce\Backend\Controllers\Admin\Brand\Repository;

use App\DataTables\BrandDataTable;
use Ecommerce\Backend\Controllers\Admin\Brand\Interface\BrandRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Brand\Models\Brand;
use Ecommerce\Backend\Controllers\Admin\Brand\Requests\StoreBrandRequest;
use Ecommerce\Backend\Controllers\Admin\Brand\Requests\UpdateBrandRequest;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Base\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandRepository implements BrandRepositoryInterface
{
    use ImageUploadTrait;

    public function getAllBrands()
    {
        $dataTable = new BrandDataTable();
        return $dataTable->render('admin.brand.index');
    }

    public function createBrand()
    {
        return view('admin.brand.create');
    }

    public function storeBrand(StoreBrandRequest $request)
    {
        $logoPath = $this->uploadImage($request, 'logo', 'uploads');
        $brand = new Brand();

        $brand->logo = $logoPath;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.brand.index');
    }

    public function editBrand(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function updateBrand(UpdateBrandRequest $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        $logoPath = $this->updateImage($request, 'logo', 'uploads', $brand->logo);

        $brand->logo = empty($logoPath) ? $brand->logo : $logoPath;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.brand.index');
    }

    public function deleteBrand(string $id)
    {
        $brand = Brand::findOrFail($id);
        if (Product::where('brand_id', $brand->id)->count() > 0) {
            return response(['status' => 'error', 'message' => 'This brand has products; you can\'t delete it.']);
        }
        $this->deleteImage($brand->logo);
        $brand->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeBrandStatus(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status == 'true' ? 1 : 0;
        $brand->save();

        return response(['message' => 'Status has been updated!']);
    }
}

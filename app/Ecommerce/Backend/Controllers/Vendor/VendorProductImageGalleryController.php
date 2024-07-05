<?php

namespace Ecommerce\Backend\Controllers\Vendor;

use App\DataTables\VendorProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Backend\Controllers\Admin\Product\Models\ProductImageGallery;
use Ecommerce\Base\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductImageGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, VendorProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);

        /** Check product vendor */
        if($product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }

        return $dataTable->render('vendor.product.image-gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** Start Validation */
        $request->validate([
            'image.*' => ['required', 'image', 'max:2048']
        ]);
        /** End Validation */

        /** Handle image upload */
        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');

        foreach($imagePaths as $path){
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }

        toastr('Uploaded successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImage = ProductImageGallery::findOrFail($id);

        /** Check product vendor */
        if($productImage->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }

        $this->deleteImage($productImage->image);
        $productImage->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}

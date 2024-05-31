<?php

namespace Ecommerce\Backend\Controllers\Vendor;

use App\DataTables\VendorProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Backend\Controllers\Admin\Product\Models\ProductVariant;
use Ecommerce\Backend\Controllers\Admin\Product\Models\ProductVariantItem;
use Illuminate\Http\Request;


class VendorProductVariantItemController extends Controller
{
    /**
     * @param VendorProductVariantItemDataTable $dataTable
     * @param $productId
     * @param $variantId
     * @return mixed
     */
    public function index(VendorProductVariantItemDataTable $dataTable, $productId, $variantId)
    {
        $product = Product::findOrFail($productId);

        $variant = ProductVariant::findOrFail($variantId);
        return $dataTable->render('vendor.product.product-variant-item.index', compact('product', 'variant'));
    }

    /**
     * @param string $productId
     * @param string $variantId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create(string $productId, string $variantId)
    {
        $variant = ProductVariant::findOrFail($variantId);
        $product = Product::findOrFail($productId);
        return view('vendor.product.product-variant-item.create', compact('variant', 'product'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Store data
     */
    public function store(Request $request)
    {
        $request->validate([
            'variant_id' => ['integer', 'required'],
            'name' => ['required', 'max:200'],
            'price' => ['integer', 'required'],
            'is_default' => ['required'],
            'status' => ['required']
        ]);

        $variantItem = new ProductVariantItem();
        $variantItem->product_variant_id = $request->variant_id;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('vendor.products-variant-item.index',
            ['productId' => $request->product_id, 'variantId' => $request->variant_id]);

    }

    /**
     * @param string $variantItemId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        return view('vendor.product.product-variant-item.edit', compact('variantItem'));
    }

    /**
     * @param Request $request
     * @param string $variantItemId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $variantItemId)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'price' => ['integer', 'required'],
            'is_default' => ['required'],
            'status' => ['required']
        ]);

        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        toastr('Update Successfully!', 'success', 'success');

        return redirect()->route('vendor.products-variant-item.index',
            ['productId' => $variantItem->productVariant->product_id, 'variantId' => $variantItem->product_variant_id]);
    }

    /**
     * @param string $variantItemId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function destroy(string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        $variantItem->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function chageStatus(Request $request)
    {
        $variantItem = ProductVariantItem::findOrFail($request->id);
        $variantItem->status = $request->status == 'true' ? 1 : 0;
        $variantItem->save();

        return response(['message' => 'Status has been updated!']);
    }

}

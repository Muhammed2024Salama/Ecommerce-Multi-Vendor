<?php

namespace Ecommerce\Backend\Controllers\Admin\ChildCategory\Repository;

use App\DataTables\ChildCategoryDataTable;
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

class ChildCategoryRepository implements ChildCategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllChildCategories()
    {
        return (new ChildCategoryDataTable())->render('admin.child-category.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function createChildCategory()
    {
        $categories = Category::all();
        return view('admin.child-category.create', compact('categories'));
    }

    /**
     * @param StoreChildCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeChildCategory(StoreChildCategoryRequest $request)
    {
        $childCategory = new ChildCategory();
        $childCategory->category_id = $request->category;
        $childCategory->sub_category_id = $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();

        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.child-category.index');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getSubCategories(Request $request)
    {
        return SubCategory::where('category_id', $request->id)->where('status', 1)->get();
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function editChildCategory(string $id)
    {
        $categories = Category::all();
        $childCategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $childCategory->category_id)->get();

        return view('admin.child-category.edit', compact('categories', 'childCategory', 'subCategories'));
    }

    /**
     * @param UpdateChildCategoryRequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateChildCategory(UpdateChildCategoryRequest $request, string $id)
    {
        $childCategory = ChildCategory::findOrFail($id);
        $childCategory->category_id = $request->category;
        $childCategory->sub_category_id = $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();

        toastr('Update Successfully!', 'success');
        return redirect()->route('admin.child-category.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function deleteChildCategory(string $id)
    {
        $childCategory = ChildCategory::findOrFail($id);
        if (Product::where('child_category_id', $childCategory->id)->count() > 0) {
            return response(['status' => 'error', 'message' => 'This item contains relations; can\'t delete it.']);
        }

        $homeSettings = HomePageSetting::all();
        foreach ($homeSettings as $item) {
            $array = json_decode($item->value, true);
            $collection = collect($array);
            if ($collection->contains('child_category', $childCategory->id)) {
                return response(['status' => 'error', 'message' => 'This item contains relations; can\'t delete it.']);
            }
        }

        $childCategory->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function changeChildCategoryStatus(Request $request)
    {
        $childCategory = ChildCategory::findOrFail($request->id);
        $childCategory->status = $request->status == 'true' ? 1 : 0;
        $childCategory->save();

        return response(['message' => 'Status has been updated!']);
    }
}

<?php

namespace Ecommerce\Backend\Controllers\Admin\BlogCategory\Repository;

use App\DataTables\BlogCategoryDataTable;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Interface\BlogCategoryRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Models\BlogCategory;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Requests\StoreBlogCategoryRequest;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Requests\UpdateBlogCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllCategories()
    {
        $dataTable = new BlogCategoryDataTable();
        return $dataTable->render('admin.blog.blog-category.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|mixed
     */
    public function createCategory()
    {
        return view('admin.blog.blog-category.create');
    }

    /**
     * @param StoreBlogCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function storeCategory(StoreBlogCategoryRequest $request)
    {
        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('admin.blog-category.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|mixed
     */
    public function editCategory(string $id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog.blog-category.edit', compact('category'));
    }

    /**
     * @param UpdateBlogCategoryRequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function updateCategory(UpdateBlogCategoryRequest $request, string $id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();

        toastr('Updated Successfully!', 'success', 'success');

        return redirect()->route('admin.blog-category.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|mixed
     */
    public function deleteCategory(string $id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();

        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function changeCategoryStatus(Request $request)
    {
        $category = BlogCategory::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();

        return response(['message' => 'Status has been updated!']);
    }
}

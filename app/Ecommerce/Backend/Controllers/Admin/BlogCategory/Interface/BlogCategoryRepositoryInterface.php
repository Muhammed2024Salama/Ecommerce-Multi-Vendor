<?php

namespace Ecommerce\Backend\Controllers\Admin\BlogCategory\Interface;

use Illuminate\Http\Request;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Requests\StoreBlogCategoryRequest;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Requests\UpdateBlogCategoryRequest;

interface BlogCategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllCategories();

    /**
     * @return mixed
     */
    public function createCategory();

    /**
     * @param StoreBlogCategoryRequest $request
     * @return mixed
     */
    public function storeCategory(StoreBlogCategoryRequest $request);

    /**
     * @param string $id
     * @return mixed
     */
    public function editCategory(string $id);

    /**
     * @param UpdateBlogCategoryRequest $request
     * @param string $id
     * @return mixed
     */
    public function updateCategory(UpdateBlogCategoryRequest $request, string $id);

    /**
     * @param string $id
     * @return mixed
     */
    public function deleteCategory(string $id);
    public function changeCategoryStatus(Request $request);
}

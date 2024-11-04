<?php

namespace Ecommerce\Backend\Controllers\Admin\ChildCategory\Interface;

use Illuminate\Http\Request;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Requests\StoreChildCategoryRequest;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Requests\UpdateChildCategoryRequest;

interface ChildCategoryRepositoryInterface
{
    public function getAllChildCategories();
    public function createChildCategory();
    public function storeChildCategory(StoreChildCategoryRequest $request);
    public function getSubCategories(Request $request);
    public function editChildCategory(string $id);
    public function updateChildCategory(UpdateChildCategoryRequest $request, string $id);
    public function deleteChildCategory(string $id);
    public function changeChildCategoryStatus(Request $request);
}

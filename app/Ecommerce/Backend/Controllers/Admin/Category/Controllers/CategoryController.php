<?php

namespace Ecommerce\Backend\Controllers\Admin\Category\Controllers;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Category\Interface\CategoryRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Category\Models\Category;
use Ecommerce\Backend\Controllers\Admin\Category\Requests\StoreCategoryRequest;
use Ecommerce\Backend\Controllers\Admin\Category\Requests\UpdateCategoryRequest;
use Ecommerce\Backend\Controllers\Admin\SubCategory\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param CategoryDataTable $dataTable
     * @return mixed
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $this->categoryRepository->create($data);

        toastr('Created Successfully ! ', 'success');

        return redirect()->route('admin.category.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(string $id)
    {
        $category = $this->categoryRepository->findById($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $this->categoryRepository->update($id, $data);

        toastr('Updated Successfully!', 'success');

        return redirect()->route('admin.category.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $category = $this->categoryRepository->findById($id);
        $subCategoryCount = $category->subCategories()->count();
        if ($subCategoryCount > 0) {
            return response(['status' => 'error', 'message' => 'This items contain, sub items for delete this you have to delete the sub items first!']);
        }
        $this->categoryRepository->delete($id);

        return response(['status' => 'success', 'Deleted Successfully !']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $this->categoryRepository->changeStatus($request->id, $request->status);
        return response(['message' => 'Status has been updated!']);
    }
}

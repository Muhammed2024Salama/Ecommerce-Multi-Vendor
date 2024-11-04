<?php

namespace Ecommerce\Backend\Controllers\Admin\Blog\Controllers;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Blog\Interface\BlogRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Blog\Models\Blog;
use Ecommerce\Backend\Controllers\Admin\Blog\Requests\StoreBlogRequest;
use Ecommerce\Backend\Controllers\Admin\Blog\Requests\UpdateBlogRequest;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Models\BlogCategory;
use Ecommerce\Base\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * @var BlogRepositoryInterface
     */
    protected $blogRepository;

    /**
     * @param BlogRepositoryInterface $blogRepository
     */
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $this->blogRepository->getAllBlogs();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->blogRepository->createBlog();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        return $this->blogRepository->storeBlog($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->blogRepository->editBlog($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, string $id)
    {
        return $this->blogRepository->updateBlog($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->blogRepository->deleteBlog($id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function changeStatus(Request $request)
    {
        return $this->blogRepository->changeBlogStatus($request);
    }
}

<?php

namespace Ecommerce\Backend\Controllers\Admin\Blog\Interface;

use Illuminate\Http\Request;
use Ecommerce\Backend\Controllers\Admin\Blog\Requests\StoreBlogRequest;
use Ecommerce\Backend\Controllers\Admin\Blog\Requests\UpdateBlogRequest;

interface BlogRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllBlogs();

    /**
     * @return mixed
     */
    public function createBlog();

    /**
     * @param StoreBlogRequest $request
     * @return mixed
     */
    public function storeBlog(StoreBlogRequest $request);

    /**
     * @param string $id
     * @return mixed
     */
    public function editBlog(string $id);

    /**
     * @param UpdateBlogRequest $request
     * @param string $id
     * @return mixed
     */
    public function updateBlog(UpdateBlogRequest $request, string $id);

    /**
     * @param string $id
     * @return mixed
     */
    public function deleteBlog(string $id);

    /**
     * @param Request $request
     * @return mixed
     */
    public function changeBlogStatus(Request $request);
}

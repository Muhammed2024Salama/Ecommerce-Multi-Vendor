<?php

namespace Ecommerce\Backend\Controllers\Admin\Blog\Repository;

use App\DataTables\BlogDataTable;
use Ecommerce\Backend\Controllers\Admin\Blog\Interface\BlogRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Blog\Models\Blog;
use Ecommerce\Backend\Controllers\Admin\Blog\Requests\StoreBlogRequest;
use Ecommerce\Backend\Controllers\Admin\Blog\Requests\UpdateBlogRequest;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Models\BlogCategory;
use Ecommerce\Base\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogRepository implements BlogRepositoryInterface
{
    use ImageUploadTrait;

    /**
     * @return mixed
     */
    public function getAllBlogs()
    {
        $dataTable = new BlogDataTable();
        return $dataTable->render('admin.blog.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|mixed
     */
    public function createBlog()
    {
        $categories = BlogCategory::where('status', 1)->get();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * @param StoreBlogRequest $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function storeBlog(StoreBlogRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $blog = new Blog();
        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category;
        $blog->user_id = Auth::user()->id;
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->status = $request->status;

        $blog->save();

        toastr('Created successfully', 'success', 'success');

        return redirect()->route('admin.blog.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|mixed
     */
    public function editBlog(string $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::where('status', 1)->get();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * @param UpdateBlogRequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function updateBlog(UpdateBlogRequest $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads', $blog->image);
        $blog->image = !empty($imagePath) ? $imagePath : $blog->image;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category;
        $blog->user_id = Auth::user()->id;
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->status = $request->status;

        $blog->save();

        toastr('Update successfully', 'success', 'success');

        return redirect()->route('admin.blog.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|mixed
     */
    public function deleteBlog(string $id)
    {
        $blog = Blog::findOrFail($id);
        $this->deleteImage($blog->image);
        $blog->comments()->delete();
        $blog->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|mixed
     */
    public function changeBlogStatus(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->status = $request->status == 'true' ? 1 : 0;
        $blog->save();

        return response(['message' => 'Status has been updated!']);
    }
}

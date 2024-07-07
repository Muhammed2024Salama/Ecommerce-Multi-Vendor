<?php

namespace Ecommerce\Backend\Controllers\Admin\BlogComment\Controllers;

use App\DataTables\BlogCommentDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\BlogComment\Models\BlogComment;

class BlogCommentController extends Controller
{
    /**
     * @param BlogCommentDataTable $dataTable
     * @return mixed
     */
    public function index(BlogCommentDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.blog-comment.index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function destory(string $id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->delete();

        return response(['status' => 'success', 'message' => 'message']);
    }
}

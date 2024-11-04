<?php

namespace Ecommerce\Backend\Controllers\Admin\BlogComment\Repository;

use App\DataTables\BlogCommentDataTable;
use Ecommerce\Backend\Controllers\Admin\BlogComment\Interface\BlogCommentRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\BlogComment\Models\BlogComment;

class BlogCommentRepository implements BlogCommentRepositoryInterface
{
    public function getAllComments()
    {
        $dataTable = new BlogCommentDataTable();
        return $dataTable->render('admin.blog.blog-comment.index');
    }

    public function deleteComment(string $id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->delete();

        return response(['status' => 'success', 'message' => 'Comment deleted successfully!']);
    }
}

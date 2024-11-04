<?php

namespace Ecommerce\Backend\Controllers\Admin\BlogComment\Interface;

use Illuminate\Http\Request;

interface BlogCommentRepositoryInterface
{
    public function getAllComments();
    public function deleteComment(string $id);
}

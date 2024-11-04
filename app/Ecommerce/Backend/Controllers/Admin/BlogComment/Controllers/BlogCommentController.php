<?php

namespace Ecommerce\Backend\Controllers\Admin\BlogComment\Controllers;

use App\DataTables\BlogCommentDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\BlogComment\Interface\BlogCommentRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\BlogComment\Models\BlogComment;

class BlogCommentController extends Controller
{
    /**
     * @var BlogCommentRepositoryInterface
     */
    protected $blogCommentRepository;

    /**
     * @param BlogCommentRepositoryInterface $blogCommentRepository
     */
    public function __construct(BlogCommentRepositoryInterface $blogCommentRepository)
    {
        $this->blogCommentRepository = $blogCommentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BlogCommentDataTable $dataTable)
    {
        return $this->blogCommentRepository->getAllComments();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->blogCommentRepository->deleteComment($id);
    }
}

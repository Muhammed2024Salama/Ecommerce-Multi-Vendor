<?php

namespace Ecommerce\Backend\Controllers\Admin\About\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\About\Interface\AboutRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\About\Models\About;
use Ecommerce\Backend\Controllers\Admin\About\Requests\UpdateAboutRequest;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected $aboutRepository;

    public function __construct(AboutRepositoryInterface $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $content = $this->aboutRepository->getFirst();
        return view('admin.about.index', compact('content'));
    }

    /**
     * @param UpdateAboutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAboutRequest $request)
    {
        $this->aboutRepository->updateOrCreate(
            ['id' => 1],
            ['content' => $request->validated()['content']]
        );

        toastr('updated successfully!', 'success', 'success');

        return redirect()->back();
    }
}

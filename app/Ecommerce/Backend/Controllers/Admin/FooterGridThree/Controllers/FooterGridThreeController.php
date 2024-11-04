<?php

namespace Ecommerce\Backend\Controllers\Admin\FooterGridThree\Controllers;

use App\DataTables\FooterGridThreeDataTable;
use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Interface\FooterGridThreeRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Models\FooterGridThree;
use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Requests\ChangeFooterTitleRequest;
use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Requests\StoreFooterGridThreeRequest;
use Ecommerce\Backend\Controllers\Admin\FooterGridTwo\Models\FooterTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FooterGridThreeController extends Controller
{
    protected $footerGridThreeRepository;

    public function __construct(FooterGridThreeRepositoryInterface $footerGridThreeRepository)
    {
        $this->footerGridThreeRepository = $footerGridThreeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FooterGridThreeDataTable $dataTable)
    {
        $footerTitle = $this->footerGridThreeRepository->getFooterTitle();
        return $dataTable->render('admin.footer.footer-grid-three.index', compact('footerTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-grid-three.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFooterGridThreeRequest $request)
    {
        $this->footerGridThreeRepository->createFooter($request->validated());

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('admin.footer-grid-three.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $footer = $this->footerGridThreeRepository->findFooterById($id);
        return view('admin.footer.footer-grid-three.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFooterGridThreeRequest $request, string $id)
    {
        $this->footerGridThreeRepository->updateFooter($id, $request->validated());

        toastr('Update Successfully!', 'success', 'success');

        return redirect()->route('admin.footer-grid-three.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->footerGridThreeRepository->deleteFooter($id);

        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $this->footerGridThreeRepository->changeFooterStatus($request->id, $request->status == 'true');

        return response(['message' => 'Status has been updated!']);
    }

    public function changeTitle(ChangeFooterTitleRequest $request)
    {
        $this->footerGridThreeRepository->changeFooterTitle($request->validated());

        toastr('Updated Successfully', 'success', 'success');

        return redirect()->back();
    }
}

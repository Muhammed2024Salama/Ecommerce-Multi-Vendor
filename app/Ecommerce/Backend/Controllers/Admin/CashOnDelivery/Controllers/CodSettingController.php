<?php

namespace Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Interface\CodSettingRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Models\CodSetting;
use Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Requests\UpdateCodSettingRequest;
use Illuminate\Http\Request;

class CodSettingController extends Controller
{
    /**
     * @var CodSettingRepositoryInterface
     */
    protected $codSettingRepository;

    /**
     * @param CodSettingRepositoryInterface $codSettingRepository
     */
    public function __construct(CodSettingRepositoryInterface $codSettingRepository)
    {
        $this->codSettingRepository = $codSettingRepository;
    }

    /**
     * @param UpdateCodSettingRequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCodSettingRequest $request, string $id)
    {
        $this->codSettingRepository->updateOrCreate(
            ['id' => $id],
            ['status' => $request->status]
        );

        toastr('Updated Successfully!', 'success', 'Success');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Http\Requests\UpdateSuperAdminFooterSettingRequest;
use App\Http\Requests\UpdateSuperAdminSettingRequest;
use App\Models\InvoiceSetting;
use App\Models\SuperAdminSetting;
use App\Repositories\SettingRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class SettingController extends AppBaseController
{
    /** @var SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function edit(Request $request)
    {
        $defaultSettings = $this->settingRepository->editSettingsData();
        $sectionName = ($request->section === null) ? 'general' : $request->section;

        return view("settings.$sectionName", compact('sectionName'), $defaultSettings);
    }

    /**
     * @param  UpdateSettingRequest  $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateSettingRequest $request)
    {
        $this->settingRepository->updateSetting($request->all());
        Flash::success('Setting updated successfully.');

        return redirect(route('settings.edit'));
    }

    //Invoice Update
    public function invoiceUpdate(Request $request)
    {
        $this->settingRepository->updateInvoiceSetting($request->all());
        Flash::success('Invoice template updated successfully');

        return redirect('admin/settings?section=setting-invoice');
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function editInvoiceTemplate($key)
    {
        $invoiceTemplate = InvoiceSetting::where('key', $key)->get();

        return $this->sendResponse($invoiceTemplate, 'InvoiceTemplate retrieved successfully.');
    }

    /**
     * Show the form for editing the specified Setting.
     *
     * @param Request $request
     *
     * @return Factory|\Illuminate\View\View
     */
    public function editSuperAdminSettings(Request $request)
    {
        $settings = $this->settingRepository->getSyncListForSuperAdmin();
        $sectionName = ($request->section === null) ? 'general' : $request->section;

        return view("super_admin_settings.$sectionName", compact('settings', 'sectionName'));
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param UpdateSuperAdminSettingRequest $request
     *
     * @throws DiskDoesNotExist
     *
     * @throws FileDoesNotExist
     *
     * @throws FileIsTooBig
     *
     * @throws MediaCannotBeDeleted
     *
     * @return RedirectResponse|Redirector
     */
    public function updateSuperAdminSettings(UpdateSuperAdminSettingRequest $request)
    {
        try {
            $this->settingRepository->updateSuperAdminSetting($request->all());
            Flash::success('Setting updated successfully.');
        } catch (\Exception $exception) {
            Flash::error($exception->getMessage());
        }

        return redirect(route('super.admin.settings.edit'));
    }

    /**
     * @return Factory|View
     */
    public function editSuperAdminFooterSettings()
    {
        $settings = SuperAdminSetting::pluck('value', 'key')->toArray();

        return view("super_admin_footer_settings.index", compact('settings'));
    }

    /**
     * @param UpdateSuperAdminFooterSettingRequest $request
     * @return RedirectResponse|Redirector
     */
    public function updateSuperAdminFooterSettings(UpdateSuperAdminFooterSettingRequest $request)
    {
        $this->settingRepository->updateSuperFooterAdminSetting($request->all());

        Flash::success('Setting updated successfully.');

        return redirect(route('super.admin.footer.settings.edit'));
    }
}

<?php

namespace App\Repositories;

use App\Models\InvoiceSetting;
use App\Models\Setting;
use App\Models\SuperAdminSetting;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class SettingRepository
 * @version February 19, 2020, 1:45 pm UTC
 */
class SettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'app_name',
        'app_logo',
    ];

    protected $availableKeys = [
        'stripe_key',
        'stripe_secret',
        'paypal_client_id',
        'paypal_secret',
        'razorpay_key',
        'razorpay_secret',
        'stripe_enabled',
        'paypal_enabled',
        'razorpay_enabled',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Setting::class;
    }

    /**
     *
     *
     * @return mixed
     */
    public function getSyncList()
    {
        return Setting::pluck('value', 'key')->toBase();
    }

    /**
     *
     *
     * @return mixed
     */
    public function getSyncListForSuperAdmin()
    {
        return SuperAdminSetting::pluck('value', 'key')->toArray();
    }

    /**
     * @param $input
     */
    public function updateSetting($input)
    {
        $input['mail_notification'] = ($input['mail_notification'] == 1) ? 1 : 0;
        $input['company_phone'] = "+".$input['prefix_code'].$input['company_phone'];
        if (isset($input['app_logo']) && !empty($input['app_logo'])) {
            /** @var Setting $setting */
            $setting = Setting::where('key', '=', 'app_logo')->first();
            $setting = $this->uploadSettingImages($setting, $input['app_logo']);
        }
        if (isset($input['favicon_icon']) && ! empty($input['favicon_icon'])) {
            /** @var Setting $setting */
            $setting = Setting::where('key', '=', 'favicon_icon')->first();
            $setting = $this->uploadSettingImages($setting, $input['favicon_icon']);
        }

        $settingInputArray = Arr::only($input, [
            'app_name', 'company_name', 'company_address', 'company_phone', 'date_format', 'time_format', 'time_zone',
            'current_currency',
            'decimal_separator', 'thousand_separator','mail_notification'
        ]);
        foreach ($settingInputArray as $key => $value) {
            Setting::where('key', '=', $key)->first()->update(['value' => $value]);
        }
    }

    public function editSettingsData()
    {
        $data = [];
        $timezoneArr = file_get_contents(storage_path('timezone/timezone.json'));
        $timezoneArr = json_decode($timezoneArr, true);
        $timezones = [];

        foreach ($timezoneArr as $utcData) {
            foreach ($utcData['utc'] as $item) {
                $timezones[$item] = $item;
            }
        }
        $data['timezones'] = $timezones;
        $data['settings'] = $this->getSyncList();
        $data['dateFormats'] = Setting::DateFormatArray;
        $data['currencies'] = getCurrencies();
        $data['templates'] = Setting::INVOICE__TEMPLATE_ARRAY;
        $data['invoiceTemplate'] = InvoiceSetting::all();

        return $data;
    }

    /**
     * @param $input
     *
     * @return bool
     */
    public function updateInvoiceSetting($input): bool
    {
        $invoiceSetting = InvoiceSetting::where('key', $input['template'])->first();
        $invoiceSetting->update([
            'template_color' => $input['default_invoice_color'],
        ]);

        return true;
    }

    /**
     * @param $setting
     * @param $value
     *
     * @return mixed
     */
    public function uploadSettingImages($setting, $value)
    {
        $setting->clearMediaCollection(Setting::PATH);
        $media = $setting->addMedia($value)->toMediaCollection(Setting::PATH, config('app.media_disc'));
        $setting = $setting->refresh();
        $setting->update(['value' => $media->getFullUrl()]);

        return $setting;
    }

    /**
     * @param array $input
     *
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws MediaCannotBeDeleted
     */
    public function updateSuperAdminSetting($input)
    {
        $setting = SuperAdminSetting::where('key', '=', 'app_name')->first();
        $settingExpireNotification = SuperAdminSetting::where('key', '=', 'plan_expire_notification')->first();
        $settingExpireNotification->update(['value' => $input['plan_expire_notification']]);
        $setting->update(['value' => $input['app_name']]);

        if (isset($input['app_logo']) && !empty($input['app_logo'])) {
            /** @var SuperAdminSetting $setting */
            $setting = SuperAdminSetting::where('key', '=', 'app_logo')->first();
            $setting->clearMediaCollection(SuperAdminSetting::PATH);
            $setting->addMedia($input['app_logo'])->toMediaCollection(SuperAdminSetting::PATH,
                config('app.media_disc'));
            $setting = $setting->refresh();
            $setting->update(['value' => $setting->logo_url]);
        }
        if (isset($input['favicon_icon']) && !empty($input['favicon_icon'])) {
            /** @var SuperAdminSetting $setting */
            $setting = SuperAdminSetting::where('key', '=', 'favicon_icon')->first();
            $setting->clearMediaCollection(SuperAdminSetting::PATH);
            $setting->addMedia($input['favicon_icon'])->toMediaCollection(SuperAdminSetting::PATH,
                config('app.media_disc'));
            $setting = $setting->refresh();
            $setting->update(['value' => $setting->logo_url]);
        }

        $input['stripe_enabled'] = (!isset($input['stripe_enabled'])) ? 0 : 1;
        $input['paypal_enabled'] = (!isset($input['paypal_enabled'])) ? 0 : 1;
        $input['razorpay_enabled'] = (!isset($input['razorpay_enabled'])) ? 0 : 1;
        $this->checkPaymentValidation($input);
        $InputArray = Arr::only($input, $this->availableKeys);
        foreach ($InputArray as $key => $value) {
            $value = ($value === null) ? "" : $value;
            SuperAdminSetting::where('key', '=', $key)->first()->update(['value' => $value]);
        }
    }


    private function checkPaymentValidation($input): void
    {
        if ((isset($input['stripe_enabled']) && $input['stripe_enabled'] === 1 &&
                empty($input['stripe_key'])) || empty($input['stripe_secret'])) {
            throw new UnprocessableEntityHttpException('Please fill up all value for stripe payment gateway.');
        }
        if ((isset($input['stripe_enabled']) && $input['paypal_enabled'] === 1 &&
                empty($input['paypal_client_id'])) || empty($input['paypal_secret'])) {
            throw new UnprocessableEntityHttpException('Please fill up all value for paypal payment gateway.');
        }
        if ((isset($input['razorpay_enabled']) && $input['razorpay_enabled'] === 1 &&
                empty($input['razorpay_key'])) || empty($input['razorpay_secret'])) {
            throw new UnprocessableEntityHttpException('Please fill up all value for paypal payment gateway.');
        }
    }

    /**
     * @param array $input
     */
    public function updateSuperFooterAdminSetting($input)
    {
        $input['phone'] = $input['phone'];
        $input['region_code'] = $input['region_code'];
        $inputArray = Arr::only($input, [
            'footer_text', 'email', 'phone', 'address', 'facebook_url', 'twitter_url',
            'youtube_url', 'linkedin_url', 'region_code',
        ]);
        foreach ($inputArray as $key => $value) {

            $setting = SuperAdminSetting::where('key', '=', $key)->first();
            $setting->update(['value' => $value]);
        }

        return $setting;
    }
}

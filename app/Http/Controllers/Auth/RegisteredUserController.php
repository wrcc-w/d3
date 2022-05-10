<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MultiTenant;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  Request  $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/',
            'password'   => 'required|same:password_confirmation|min:6',
        ]);

        $input = $request->all();

        try {
            DB::beginTransaction();

            /** @var User $user */
            $tenant = MultiTenant::create(['tenant_username' => $request->first_name]);

            $input['password'] = Hash::make($input['password']);
            $input['role'] = getAdminRoleId();
            $input['tenant_id'] = $tenant->id;
            $input['email_verified_at'] = Carbon::now();

            $user = User::create($input);

            if (isset($input['role']) && ! empty($input['role'])) {
                $user->assignRole($input['role']);
            }
            if (isset($input['profile']) && ! empty($input['profile'])) {
                $user->addMedia($input['profile'])->toMediaCollection(User::PROFILE, config('app.media_disc'));
            }

            // assign the default plan to the user when they registers.
            $subscriptionPlan = SubscriptionPlan::where('is_default', 1)->first();
            $trialDays = $subscriptionPlan->trial_days;

            $subscription = [
                'user_id'              => $user->id,
                'subscription_plan_id' => $subscriptionPlan->id,
                'plan_amount'          => $subscriptionPlan->price,
                'plan_frequency'       => $subscriptionPlan->frequency,
                'start_date'           => Carbon::now(),
                'end_date'             => Carbon::now()->addDays($trialDays),
                'trial_ends_at'        => Carbon::now()->addDays($trialDays),
                'status'               => Subscription::ACTIVE,
            ];
            Subscription::create($subscription);

            session(['tenant_id' => $tenant->id]);
            Artisan::call('db:seed', ['--class' => 'SettingsTableSeeder']);
            Artisan::call('db:seed', ['--class' => 'SettingTableSeederFields']);
            Artisan::call('db:seed', ['--class' => 'SettingTablePaymentGatewayFieldSeeder']);
            Artisan::call('db:seed', ['--class' => 'SettingFavIconFieldSeeder']);
            Artisan::call('db:seed', ['--class' => 'InvoiceSettingTableSeeder']);
            Artisan::call('db:seed', ['--class' => 'InvoiceSettingTemplateSeeder']);

            event(new Registered($user));

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($exception->getMessage());
        }

        Flash::success('You have registered successfully.');

        return redirect(route('login'));
    }
}

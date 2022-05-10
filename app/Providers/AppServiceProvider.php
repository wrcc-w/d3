<?php

namespace App\Providers;

use App\Rules\UniqueRecordRule;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        if (getCurrentTimeZone() != null) {
            date_default_timezone_set(getCurrentTimeZone());
        }

        \Validator::extend('is_unique', function ($attribute, $value, $parameters, $validator) {
            list($table, $column) = $parameters;

            $updateFieldValue = isset($parameters[2]) ? $parameters[2] : null;

            return (new UniqueRecordRule($table, $column, $updateFieldValue))->passes($attribute, $value);
        });
    }
}

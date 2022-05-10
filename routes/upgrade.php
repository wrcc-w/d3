<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


//upgrade To V2.0.0
Route::get('/upgrade-to-v2-0-0', function () {

    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2021_12_30_104502_invoice_settings.php',
    ]);
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_01_03_112511_notes_size_increase_in_all_modules.php',
    ]);
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_01_12_121221_add_template_id_field_in_invoice.php',
    ]);
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_01_19_100948_change_invoice_template_id_default_value.php',
    ]);
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_01_20_173011_add_mail_notification_field_in_settings.php',
    ]);
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_01_21_163008_add_currency_code.php',
    ]);
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_01_21_171131_change_product_value_data_type.php',
    ]);
});

Route::get('/upgrade-to-v2-1-0', function () {
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_01_26_151000_create_invoice_item_taxes_table.php',
    ]);
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_01_28_092234_remove_tax_field_from_invoice_items_table.php',
    ]);
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_02_07_180923_change_description_data_type_in_client_and_products_table.php',
    ]);
});

Route::get('/upgrade-to-v2-2-0', function () {
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_02_14_124652_change_invoice_final_amount_float_size.php',
    ]);
});

Route::get('/upgrade-to-v3-3-0', function () {
    Artisan::call('migrate', [
        '--force' => true,
        '--path'  => 'database/migrations/2022_02_18_101208_add_dark_mode_field_on_users_table.php',
    ]);
});

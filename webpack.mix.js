const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').
    postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.copyDirectory('resources/assets/images',
    'public/assets/images')
mix.copyDirectory('resources/assets/css/landing',
    'public/assets/css/landing')

mix.copy('node_modules/datatables/media/css/jquery.dataTables.css',
    'public/assets/css/jquery.dataTables.css')
mix.copy('node_modules/datatables/media/images', 'public/assets/images')
mix.babel('node_modules/datatables/media/js/jquery.dataTables.min.js',
    'public/assets/js/jquery.dataTables.min.js')
mix.babel('node_modules/moment/min/moment.min.js',
    'public/assets/js/moment.min.js')
mix.copy('node_modules/izitoast/dist/css/iziToast.min.css',
    'public/assets/css/iziToast.min.css')

mix.babel('node_modules/izitoast/dist/js/iziToast.min.js',
    'public/assets/js/iziToast.min.js');

mix.babel('node_modules/@simonwep/pickr/dist/themes/nano.min.css',
    'public/assets/css/nano.min.css');

mix.sass('resources/assets/css/style.scss', 'assets/css/style.css').
    sass('resources/assets/css/custom.scss', 'assets/css/custom.css').
    sass('resources/assets/css/dashboard.scss', 'assets/css/dashboard.css').
    sass('resources/assets/css/app.scss', 'assets/css/app.css').
    sass('resources/assets/css/invoice-pdf.scss', 'assets/css/invoice-pdf.css').
    sass('resources/assets/css/invoice-template.scss',
        'assets/css/invoice-template.css').
    sass('resources/assets/css/infy-loader.scss',
    'assets/css/infy-loader.css').sass('resources/assets/css/custom-dark-mode.scss',
    'assets/css/custom-dark-mode.css').sass('resources/assets/css/invoice-template-dark-mode.scss',
    'assets/css/invoice-template-dark-mode.css').css('resources/assets/css/jquery.toast.min.css',
    'assets/css/jquery.toast.min.css').css('resources/assets/css/template.css',
    'assets/css/template.css').sass('resources/assets/css/livewire-table.scss', 'assets/css/livewire-table.css').sass('resources/assets/css/livewire-table-dark.scss', 'assets/css/livewire-table-dark.css').version();

mix.js('resources/assets/js/custom/custom.js',
    'public/assets/js/custom/custom.js').js('resources/assets/js/custom/custom-datatable.js',
    'public/assets/js/custom/custom-datatable.js').js('resources/assets/js/roles/roles.js',
    'public/assets/js/roles/roles.js').js('resources/assets/js/dashboard/dashboard.js',
    'public/assets/js/dashboard/dashboard.js').js('resources/assets/js/users/users.js',
    'public/assets/js/users/users.js').js('resources/assets/js/users/create-edit.js',
    'public/assets/js/users/create-edit.js').js('resources/assets/js/category/category.js',
        'public/assets/js/category/category.js').
    js('resources/assets/js/custom/phone-number-country-code.js'
        , 'public/assets/js/custom/phone-number-country-code.js').
    js('resources/assets/js/client/client.js',
        'public/assets/js/client/client.js').
    js('resources/assets/js/client/create-edit.js',
        'public/assets/js/client/create-edit.js').
    js('resources/assets/js/product/product.js',
        'public/assets/js/product/product.js').
    js('resources/assets/js/product/create-edit.js',
        'public/assets/js/product/create-edit.js').
    js('resources/assets/js/invoice/invoice.js',
        'public/assets/js/invoice/invoice.js').
    js('resources/assets/js/invoice/create-edit.js',
        'public/assets/js/invoice/create-edit.js').
    js('resources/assets/js/settings/setting.js',
        'public/assets/js/settings/setting.js').js('resources/assets/js/tax/tax.js',
    'public/assets/js/tax/tax.js').js('resources/assets/js/currency/currency.js',
    'public/assets/js/currency/currency.js').js('resources/assets/js/users/user-profile.js',
    'public/assets/js/users/user-profile.js').js('resources/assets/js/sidebar_menu_search/sidebar_menu_search.js',
    'public/assets/js/sidebar_menu_search/sidebar_menu_search.js').js('resources/assets/js/invoice/invoice_payment_history.js',
    'public/assets/js/invoice/invoice_payment_history.js').js('resources/assets/js/client_panel/invoice/invoice.js',
    'public/assets/js/client_panel/invoice/invoice.js').js('resources/assets/js/transaction/transaction.js',
        'public/assets/js/transaction/transaction.js').
    js('resources/assets/js/client_panel/transaction/transaction.js',
        'public/assets/js/client_panel/transaction/transaction.js').
    js('resources/assets/js/settings/invoice-template.js',
        'public/assets/js/settings/invoice-template.js').
    js('resources/assets/js/client/invoice.js',
        'public/assets/js/client/invoice.js').
    js('resources/assets/js/invoice/invoice_send.js',
        'public/assets/js/invoice/invoice_send.js').
    js('resources/assets/js/payment/payment.js',
        'public/assets/js/payment/payment.js').
    js('resources/assets/js/subscription_plans/subscription_plan.js',
        'public/assets/js/subscription_plans/subscription_plan.js').
    js('resources/assets/js/subscription_plans/create-edit.js',
        'public/assets/js/subscription_plans/create-edit.js').
    js('resources/assets/js/subscription_plans/plan_features.js',
        'public/assets/js/subscription_plans/plan_features.js').
    js('resources/assets/js/jquery.toast.min.js',
        'public/assets/js/jquery.toast.min.js').
    js('resources/assets/js/custom/delete.js',
        'public/assets/js/custom/delete.js').
    js('resources/assets/js/subscriptions/admin-free-subscription.js',
        'public/assets/js/subscriptions/admin-free-subscription.js').
    js('resources/assets/js/subscriptions/free-subscription.js',
        'public/assets/js/subscriptions/free-subscription.js').
    js('resources/assets/js/subscriptions/payment-message.js',
        'public/assets/js/subscriptions/payment-message.js').
    js('resources/assets/js/subscriptions/subscription.js',
        'public/assets/js/subscriptions/subscription.js').
    js('resources/assets/js/subscriptions/subscriptions-transactions.js',
        'public/assets/js/subscriptions/subscriptions-transactions.js').
    js('resources/assets/js/faqs/faqs.js',
        'public/assets/js/faqs/faqs.js').
    js('resources/assets/js/contact_enquiry/contact_enquiry.js',
        'public/assets/js/contact_enquiry/contact_enquiry.js').
    js('resources/assets/js/super_admin_testimonial/testimonial.js',
        'public/assets/js/super_admin_testimonial/testimonial.js').
    js('resources/assets/js/languageChange/languageChange.js',
        'public/assets/js/languageChange/languageChange.js').
    js('resources/assets/js/super_admin_enquiry/super_admin_enquiry.js',
        'public/assets/js/super_admin_enquiry/super_admin_enquiry.js').
    js('resources/assets/js/super_admin_settings/setting.js',
        'public/assets/js/super_admin_settings/setting.js').
    js('resources/assets/js/subscribe/create.js',
        'public/assets/js/subscribe/create.js').
    js('resources/assets/js/subscribe/subscribe.js',
        'public/assets/js/subscribe/subscribe.js').
    version();

//copy folder
//DatePicker
mix.copy('node_modules/daterangepicker/daterangepicker.js',
    'public/assets/js/daterangepicker.js');
mix.copy('node_modules/daterangepicker/moment.min.js',
    'public/assets/js/moment.min.js');
mix.copy('node_modules/daterangepicker/daterangepicker.css', 'public/assets/css/daterangepicker.css');

mix.copy('node_modules/intl-tel-input/build/css/intlTelInput.css',
    'public/assets/css/inttel/css/intlTelInput.css');
mix.copy('node_modules/intl-tel-input/build/css/intlTelInput.css',
    'public/assets/css/inttel/css/intlTelInput.css');
mix.copyDirectory('node_modules/intl-tel-input/build/img',
    'public/assets/css/inttel/img');

mix.babel('node_modules/intl-tel-input/build/js/intlTelInput.js',
    'public/assets/js/inttel/js/intlTelInput.min.js');
mix.babel('node_modules/intl-tel-input/build/js/utils.js',
    'public/assets/js/inttel/js/utils.min.js');
mix.babel('node_modules/chart.js/dist/chart.min.js',
    'public/assets/js/chart.min.js');

mix.babel(
    'vendor/phpunit/php-code-coverage/src/Report/Html/Renderer/Template/css/bootstrap.min.css',
    'public/assets/css/bootstrap.min.css');
mix.babel('node_modules/@simonwep/pickr/dist/pickr.min.js',
    'public/assets/js/pickr.min.js');

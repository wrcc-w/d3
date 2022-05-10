/*!
 *  Lang.js for Laravel localization in JavaScript.
 *
 *  @version 1.1.10
 *  @license MIT https://github.com/rmariuzzo/Lang.js/blob/master/LICENSE
 *  @site    https://github.com/rmariuzzo/Lang.js
 *  @author  Rubens Mariuzzo <rubens@mariuzzo.com>
 */
(function (root, factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        define([], factory);
    } else if (typeof exports ===
        'object') {module.exports = factory();} else {root.Lang = factory();}
})(this, function () {
    'use strict';

    function inferLocale () {
        if (typeof document !== 'undefined' &&
            document.documentElement) {return document.documentElement.lang;}
    }

    function convertNumber (str) {
        if (str === '-Inf') {return -Infinity;} else if (str === '+Inf' ||
            str === 'Inf' || str === '*') {return Infinity;}
        return parseInt(str, 10);
    }

    var intervalRegexp = /^({\s*(\-?\d+(\.\d+)?[\s*,\s*\-?\d+(\.\d+)?]*)\s*})|([\[\]])\s*(-Inf|\*|\-?\d+(\.\d+)?)\s*,\s*(\+?Inf|\*|\-?\d+(\.\d+)?)\s*([\[\]])$/;
    var anyIntervalRegexp = /({\s*(\-?\d+(\.\d+)?[\s*,\s*\-?\d+(\.\d+)?]*)\s*})|([\[\]])\s*(-Inf|\*|\-?\d+(\.\d+)?)\s*,\s*(\+?Inf|\*|\-?\d+(\.\d+)?)\s*([\[\]])/;
    var defaults = { locale: 'en' };
    var Lang = function (options) {
        options = options || {};
        this.locale = options.locale || inferLocale() || defaults.locale;
        this.fallback = options.fallback;
        this.messages = options.messages;
    };
    Lang.prototype.setMessages = function (messages) {this.messages = messages;};
    Lang.prototype.getLocale = function () {
        return this.locale || this.fallback;
    };
    Lang.prototype.setLocale = function (locale) {this.locale = locale;};
    Lang.prototype.getFallback = function () {return this.fallback;};
    Lang.prototype.setFallback = function (fallback) {this.fallback = fallback;};
    Lang.prototype.has = function (key, locale) {
        if (typeof key !== 'string' || !this.messages) {return false;}
        return this._getMessage(key, locale) !== null;
    };
    Lang.prototype.get = function (key, replacements, locale) {
        if (!this.has(key, locale)) {return key;}
        var message = this._getMessage(key, locale);
        if (message === null) {return key;}
        if (replacements) {
            message = this._applyReplacements(message, replacements);
        }
        return message;
    };
    Lang.prototype.trans = function (key, replacements) {
        return this.get(key, replacements);
    };
    Lang.prototype.choice = function (
        key, number, replacements, locale) {
        replacements = typeof replacements !== 'undefined' ? replacements : {};
        replacements.count = number;
        var message = this.get(key, replacements, locale);
        if (message === null || message === undefined) {return message;}
        var messageParts = message.split('|');
        var explicitRules = [];
        for (var i = 0; i < messageParts.length; i++) {
            messageParts[i] = messageParts[i].trim();
            if (anyIntervalRegexp.test(messageParts[i])) {
                var messageSpaceSplit = messageParts[i].split(/\s/);
                explicitRules.push(messageSpaceSplit.shift());
                messageParts[i] = messageSpaceSplit.join(' ');
            }
        }
        if (messageParts.length === 1) {return message;}
        for (var j = 0; j < explicitRules.length; j++) {
            if (this._testInterval(number,
                explicitRules[j])) {return messageParts[j];}
        }
        var pluralForm = this._getPluralForm(number);
        return messageParts[pluralForm];
    };
    Lang.prototype.transChoice = function (
        key, count, replacements) {
        return this.choice(key, count, replacements);
    };
    Lang.prototype._parseKey = function (key, locale) {
        if (typeof key !== 'string' || typeof locale !== 'string') {return null;}
        var segments = key.split('.');
        var source = segments[0].replace(/\//g, '.');
        return {
            source: locale + '.' + source,
            sourceFallback: this.getFallback() + '.' + source,
            entries: segments.slice(1),
        };
    };
    Lang.prototype._getMessage = function (key, locale) {
        locale = locale || this.getLocale();
        key = this._parseKey(key, locale);
        if (this.messages[key.source] === undefined &&
            this.messages[key.sourceFallback] === undefined) {return null;}
        var message = this.messages[key.source];
        var entries = key.entries.slice();
        var subKey = '';
        while (entries.length && message !== undefined) {
            var subKey = !subKey
                ? entries.shift()
                : subKey.concat('.', entries.shift());
            if (message[subKey] !== undefined) {
                message = message[subKey];
                subKey = '';
            }
        }
        if (typeof message !== 'string' && this.messages[key.sourceFallback]) {
            message = this.messages[key.sourceFallback];
            entries = key.entries.slice();
            subKey = '';
            while (entries.length && message !== undefined) {
                var subKey = !subKey ? entries.shift() : subKey.concat('.',
                    entries.shift());
                if (message[subKey]) {
                    message = message[subKey];
                    subKey = '';
                }
            }
        }
        if (typeof message !== 'string') {return null;}
        return message;
    };
    Lang.prototype._findMessageInTree = function (
        pathSegments, tree) {
        while (pathSegments.length && tree !== undefined) {
            var dottedKey = pathSegments.join('.');
            if (tree[dottedKey]) {
                tree = tree[dottedKey];
                break;
            }
            tree = tree[pathSegments.shift()];
        }
        return tree;
    };
    Lang.prototype._applyReplacements = function (
        message, replacements) {
        for (var replace in replacements) {
            message = message.replace(new RegExp(':' + replace, 'gi'),
                function (match) {
                    var value = replacements[replace];
                    var allCaps = match === match.toUpperCase();
                    if (allCaps) {return value.toUpperCase();}
                    var firstCap = match === match.replace(/\w/i,
                        function (letter) {return letter.toUpperCase();});
                    if (firstCap) {
                        return value.charAt(0).toUpperCase() + value.slice(1);
                    }
                    return value;
                });
        }
        return message;
    };
    Lang.prototype._testInterval = function (
        count, interval) {
        if (typeof interval !==
            'string') {throw'Invalid interval: should be a string.';}
        interval = interval.trim();
        var matches = interval.match(intervalRegexp);
        if (!matches) {throw'Invalid interval: ' + interval;}
        if (matches[2]) {
            var items = matches[2].split(',');
            for (var i = 0; i < items.length; i++) {
                if (parseInt(items[i], 10) === count) {return true;}
            }
        } else {
            matches = matches.filter(function (match) {return !!match;});
            var leftDelimiter = matches[1];
            var leftNumber = convertNumber(matches[2]);
            if (leftNumber === Infinity) {leftNumber = -Infinity;}
            var rightNumber = convertNumber(matches[3]);
            var rightDelimiter = matches[4];
            return (leftDelimiter === '[' ? count >= leftNumber : count >
                    leftNumber) &&
                (rightDelimiter === ']' ? count <= rightNumber : count <
                    rightNumber);
        }
        return false;
    };
    Lang.prototype._getPluralForm = function (count) {
        switch (this.locale) {
            case'az':
            case'bo':
            case'dz':
            case'id':
            case'ja':
            case'jv':
            case'ka':
            case'km':
            case'kn':
            case'ko':
            case'ms':
            case'th':
            case'tr':
            case'vi':
            case'zh':
                return 0;
            case'af':
            case'bn':
            case'bg':
            case'ca':
            case'da':
            case'de':
            case'el':
            case'en':
            case'eo':
            case'es':
            case'et':
            case'eu':
            case'fa':
            case'fi':
            case'fo':
            case'fur':
            case'fy':
            case'gl':
            case'gu':
            case'ha':
            case'he':
            case'hu':
            case'is':
            case'it':
            case'ku':
            case'lb':
            case'ml':
            case'mn':
            case'mr':
            case'nah':
            case'nb':
            case'ne':
            case'nl':
            case'nn':
            case'no':
            case'om':
            case'or':
            case'pa':
            case'pap':
            case'ps':
            case'pt':
            case'so':
            case'sq':
            case'sv':
            case'sw':
            case'ta':
            case'te':
            case'tk':
            case'ur':
            case'zu':
                return count == 1 ? 0 : 1;
            case'am':
            case'bh':
            case'fil':
            case'fr':
            case'gun':
            case'hi':
            case'hy':
            case'ln':
            case'mg':
            case'nso':
            case'xbr':
            case'ti':
            case'wa':
                return count === 0 || count === 1 ? 0 : 1;
            case'be':
            case'bs':
            case'hr':
            case'ru':
            case'sr':
            case'uk':
                return count % 10 == 1 && count % 100 != 11 ? 0 : count % 10 >=
                2 && count % 10 <= 4 && (count % 100 < 10 || count % 100 >= 20)
                    ? 1
                    : 2;
            case'cs':
            case'sk':
                return count == 1 ? 0 : count >= 2 && count <= 4 ? 1 : 2;
            case'ga':
                return count == 1 ? 0 : count == 2 ? 1 : 2;
            case'lt':
                return count % 10 == 1 && count % 100 != 11 ? 0 : count % 10 >=
                2 && (count % 100 < 10 || count % 100 >= 20) ? 1 : 2;
            case'sl':
                return count % 100 == 1 ? 0 : count % 100 == 2 ? 1 : count %
                100 == 3 || count % 100 == 4 ? 2 : 3;
            case'mk':
                return count % 10 == 1 ? 0 : 1;
            case'mt':
                return count == 1 ? 0 : count === 0 || count % 100 > 1 &&
                count % 100 < 11 ? 1 : count % 100 > 10 && count % 100 < 20
                    ? 2
                    : 3;
            case'lv':
                return count === 0 ? 0 : count % 10 == 1 && count % 100 != 11
                    ? 1
                    : 2;
            case'pl':
                return count == 1 ? 0 : count % 10 >= 2 && count % 10 <= 4 &&
                (count % 100 < 12 || count % 100 > 14) ? 1 : 2;
            case'cy':
                return count == 1 ? 0 : count == 2 ? 1 : count == 8 || count ==
                11 ? 2 : 3;
            case'ro':
                return count == 1 ? 0 : count === 0 || count % 100 > 0 &&
                count % 100 < 20 ? 1 : 2;
            case'ar':
                return count === 0 ? 0 : count == 1 ? 1 : count == 2
                    ? 2
                    : count % 100 >= 3 && count % 100 <= 10 ? 3 : count % 100 >=
                    11 && count % 100 <= 99 ? 4 : 5;
            default:
                return 0;
        }
    };
    return Lang;
});

(function () {
    Lang = new Lang();
    Lang.setMessages({
        'en.messages': {
            'admin_dashboard': {
                'dashboard': 'Dashboard',
                'day': 'Day',
                'month': 'Month',
                'name': 'NAME',
                'no_record_found': 'No Record Found',
                'payment_overview': 'Payment Overview',
                'registered': 'REGISTERED',
                'total_amount': 'Total Amount',
                'total_clients': 'Total Clients',
                'total_due': 'Total Due',
                'total_invoices': 'Total Invoices',
                'total_overdue_invoice': 'Total Overdue Invoices',
                'total_paid': 'Total Paid',
                'total_paid_invoices': 'Total Paid Invoices',
                'total_partial_paid_invoices': 'Total Partially Paid Invoices',
                'total_payments': 'Total Payments',
                'total_products': 'Total Products',
                'total_unpaid_invoices': 'Total Unpaid Invoices',
                'week': 'Week',
                'yearly_income_overview': 'Yearly Income Overview',
            },
            'apps': 'Apps',
            'categories': 'Categories',
            'category': {
                'add_category': 'Add Category',
                'category': 'Category',
                'edit_category': 'Edit Category',
            },
            'cities': 'Cities',
            'client': {
                'add_client': 'Add Client',
                'add_user': 'Add User',
                'address': 'Address',
                'city': 'City',
                'client': 'Client',
                'client_details': 'Client Details',
                'confirm_password': 'Confirm Password',
                'contact_no': 'Contact No',
                'country': 'Country',
                'created_at': 'Date',
                'edit_user': 'Edit User',
                'email': 'Email',
                'female': 'Female',
                'first_name': 'First Name',
                'gender': 'Gender',
                'last_name': 'Last Name',
                'male': 'Male',
                'note': 'Note',
                'notes': 'Notes',
                'password': 'Password',
                'postal_code': 'Postal Code',
                'profile': 'Profile',
                'role': 'Role',
                'state': 'State',
                'website': 'Website',
            },
            'clients': 'Clients',
            'common': {
                'action': 'Action',
                'actions': 'Actions',
                'active': 'Active',
                'add': 'Add',
                'address': 'Address',
                'allow_file_type': 'Allowed file types',
                'back': 'Back',
                'cancel': 'Cancel',
                'city': 'City',
                'country': 'Country',
                'created_at': 'Created',
                'de_active': 'Deactive',
                'default': 'Default',
                'details': 'Details',
                'discard': 'Discard',
                'edit': 'Edit',
                'filter': 'Filter',
                'filter_options': 'Filter Options',
                'n\/a': 'N\/A',
                'name': 'Name',
                'pay': 'Pay',
                'payment_type': 'Payment Type',
                'please_wait': 'Please wait...',
                'reset': 'Reset',
                'save': 'Save',
                'save_draft': 'Save As Draft',
                'save_send': 'Save & Send',
                'service': 'Service',
                'state': 'State',
                'status': 'Status',
                'submit': 'Submit',
                'updated_at': 'Updated',
                'value': 'Value',
            },
            'countries': 'Countries',
            'currency': {
                'add_currency': 'Add Currency',
                'edit_currency': 'Edit Currency',
                'icon': 'Icon',
            },
            'dashboard': 'Dashboard',
            'general': 'General',
            'invoice': {
                'add': 'Add',
                'add_note_term': 'Add Note & Terms',
                'amount': 'Amount',
                'client': 'Client',
                'client_email': 'Client Email',
                'client_name': 'Client Name',
                'discount': 'Discount',
                'discount_type': 'Discount Type',
                'download': 'Download',
                'due_amount': 'Due Amount',
                'due_date': 'Due Date',
                'edit_invoice': 'Edit Invoice',
                'invoice': 'Invoice',
                'invoice_date': 'Invoice Date',
                'invoice_details': 'Invoice Details',
                'invoice_id': 'Invoice Id',
                'invoice_pdf': 'Invoice',
                'new_invoice': 'New Invoice',
                'note': 'Note',
                'paid': 'Paid',
                'payment': 'Payment',
                'payment_method': 'Payment Method',
                'price': 'Price',
                'print_invoice': 'Print Invoice',
                'qty': 'Qty',
                'recurring': 'Recurring',
                'remove_note_term': 'Remove Note & Terms',
                'sub_total': 'Sub Total',
                'tax': 'Tax',
                'terms': 'Terms',
                'total': 'Total',
                'total_tax': 'Tax',
                'transactions': 'Transactions',
            },
            'invoice_templates': 'Invoice Templates',
            'invoices': 'Invoices',
            'language': 'Language',
            'notification': {
                'mark_all_as_read': 'Mark All As Read',
                'notifications': 'Notifications',
                'you_don`t_have_any_new_notification': 'You don\'t have any new notification',
            },
            'payment': {
                'add_payment': 'Add Payment',
                'payable_amount': 'Payable Amount',
                'payment_date': 'Payment Date',
                'payment_mode': 'Payment Mode',
                'payment_type': 'Payment Type',
                'transaction_id': 'Transaction Id',
            },
            'product': {
                'add_product': 'Add Product',
                'category': 'Category',
                'code': 'Product Code',
                'description': 'Description',
                'edit_product': 'Edit Product',
                'image': 'Image',
                'name': 'Name',
                'price': 'Price',
                'product': 'Product',
                'product_name': 'Product Name',
                'unit_price': 'Unit Price',
                'updated_at': 'Updated At',
            },
            'products': 'Products',
            'roles': 'Roles',
            'setting': {
                'address': 'Address',
                'app_logo': 'App Logo',
                'app_name': 'App Name',
                'clinic_name': 'Clinic Name',
                'color': 'Color',
                'company_address': 'Company Address',
                'company_image_validation': 'The image must be of pixel 210 x 50.',
                'company_logo': 'Company Logo',
                'company_name': 'Company Name',
                'company_phone': 'Company Phone',
                'contact_information': 'Contact Information',
                'currency': 'Currency',
                'currency_settings': 'Currency Settings',
                'date_format': 'Date Format',
                'decimal_separator': 'Decimal Separator',
                'fav_icon': 'Favicon',
                'general': 'General',
                'general_details': 'General Details',
                'image_validation': 'The image must be of pixel 90 x 60.',
                'invoice_template': 'Invoice Template',
                'postal_code': 'Postal Code',
                'prefix': 'Prefix',
                'setting': 'Setting',
                'specialities': 'Specialities',
                'thousand_separator': 'Thousand Separator',
                'time_format': 'Time Format',
                'timezone': 'Time Zone',
            },
            'settings': 'Settings',
            'sign_out': 'Sign Out',
            'states': 'States',
            'tax': {
                'add_tax': 'Add Tax',
                'edit_tax': 'Edit Tax',
                'is_default': 'Is Default',
                'no': 'No',
                'tax': 'Tax',
                'yes': 'Yes',
            },
            'taxes': 'Taxes',
            'transactions': 'Transactions',
            'user': {
                'account': 'Account',
                'account_setting': 'Account Settings',
                'avatar': 'Avatar',
                'change_password': 'Change Password',
                'confirm_password': 'Confirm Password',
                'contact_number': 'Contact Number',
                'current_password': 'Current Password',
                'email': 'Email',
                'full_name': 'Full Name',
                'gender': 'Gender',
                'new_password': 'New Password',
                'phone': 'Phone',
                'profile': 'Profile',
                'profile_details': 'Profile Details',
                'save_changes': 'Save Changes',
                'setting': 'Setting',
                'user_details': 'User Details',
            },
            'users': 'Users',
        }, 'zh.messages': {
            'admin_dashboard': {
                'dashboard': '\u4eea\u8868\u677f',
                'day': '\u5929',
                'month': '\u6708',
                'name': '\u59d3\u540d',
                'no_record_found': '\u672a\u627e\u5230\u8bb0\u5f55',
                'payment_overview': '\u4ed8\u6b3e\u6982\u89c8',
                'registered': '\u6ce8\u518c',
                'total_amount': '\u603b\u91d1\u989d',
                'total_clients': '\u603b\u5ba2\u6237',
                'total_due': '\u603b\u5230\u671f',
                'total_invoices': '\u603b\u53d1\u7968',
                'total_overdue_invoice': '\u603b\u903e\u671f\u53d1\u7968',
                'total_paid': '\u603b\u652f\u4ed8',
                'total_paid_invoices': '\u603b\u5df2\u4ed8\u53d1\u7968',
                'total_partial_paid_invoices': '\u90e8\u5206\u652f\u4ed8\u7684\u603b\u53d1\u7968',
                'total_payments': '\u603b\u4ed8\u6b3e',
                'total_products': '\u603b\u4ea7\u54c1',
                'total_unpaid_invoices': '\u603b\u672a\u4ed8\u53d1\u7968',
                'week': '\u5468',
                'yearly_income_overview': '\u5e74\u6536\u5165\u6982\u89c8',
            },
            'apps': '\u5e94\u7528\u7a0b\u5e8f',
            'categories': '\u7c7b\u522b',
            'category': {
                'add_category': '\u6dfb\u52a0\u7c7b\u522b',
                'category': '\u7c7b\u522b',
                'edit_category': '\u7f16\u8f91\u7c7b\u522b',
            },
            'cities': '\u57ce\u5e02',
            'client': {
                'add_client': '\u6dfb\u52a0\u5ba2\u6237\u7aef',
                'add_user': '\u6dfb\u52a0\u7528\u6237',
                'address': '\u5730\u5740',
                'city': '\u57ce\u5e02',
                'client': '\u5ba2\u6237',
                'client_details': '\u5ba2\u6237\u8be6\u60c5',
                'confirm_password': '\u786e\u8ba4\u5bc6\u7801',
                'contact_no': '\u8054\u7cfb\u53f7\u7801',
                'country': '\u56fd\u5bb6',
                'created_at': '\u65e5\u671f',
                'edit_user': '\u7f16\u8f91\u7528\u6237',
                'email': '\u7535\u5b50\u90ae\u4ef6',
                'female': '\u5973',
                'first_name': '\u540d\u5b57',
                'gender': '\u6027\u522b',
                'last_name': '\u59d3\u6c0f',
                'male': '\u7537',
                'note': '\u6ce8\u610f',
                'notes': '\u6ce8\u91ca',
                'password': '\u5bc6\u7801',
                'postal_code': '\u90ae\u653f\u7f16\u7801',
                'profile': '\u4e2a\u4eba\u8d44\u6599',
                'role': '\u89d2\u8272',
                'state': '\u72b6\u6001',
                'website': '\u7f51\u7ad9',
            },
            'clients': '\u5ba2\u6237',
            'common': {
                'action': '\u52a8\u4f5c',
                'actions': '\u52a8\u4f5c',
                'active': '\u6d3b\u8dc3',
                'add': '\u6dfb\u52a0',
                'address': '\u5730\u5740',
                'allow_file_type': '\u5141\u8bb8\u7684\u6587\u4ef6\u7c7b\u578b',
                'back': '\u8fd4\u56de',
                'cancel': '\u53d6\u6d88',
                'city': '\u57ce\u5e02',
                'country': '\u56fd\u5bb6',
                'created_at': '\u521b\u5efa',
                'de_active': '\u4e0d\u6d3b\u8dc3',
                'default': '\u9ed8\u8ba4',
                'details': '\u8be6\u60c5',
                'discard': '\u4e22\u5f03',
                'edit': '\u7f16\u8f91',
                'filter': '\u8fc7\u6ee4\u5668',
                'filter_options': '\u8fc7\u6ee4\u5668\u9009\u9879',
                'n\/a': '\u4e0d\u9002\u7528',
                'name': '\u59d3\u540d',
                'pay': '\u652f\u4ed8',
                'payment_type': '\u4ed8\u6b3e\u7c7b\u578b',
                'please_wait': '\u8bf7\u7a0d\u5019...',
                'reset': '\u91cd\u7f6e',
                'save': '\u4fdd\u5b58',
                'save_draft': '\u53e6\u5b58\u4e3a\u8349\u7a3f',
                'save_send': '\u4fdd\u5b58\u5e76\u53d1\u9001',
                'service': '\u670d\u52a1',
                'state': '\u72b6\u6001',
                'status': '\u72b6\u6001',
                'submit': '\u63d0\u4ea4',
                'updated_at': '\u66f4\u65b0',
                'value': '\u4ef7\u503c',
            },
            'countries': '\u56fd\u5bb6',
            'currency': {
                'add_currency': '\u6dfb\u52a0\u8d27\u5e01',
                'edit_currency': '\u7f16\u8f91\u8d27\u5e01',
                'icon': '\u56fe\u6807',
            },
            'dashboard': '\u4eea\u8868\u677f',
            'general': '\u4e00\u822c',
            'invoice': {
                'add': '\u6dfb\u52a0',
                'add_note_term': '\u6dfb\u52a0\u6ce8\u91ca\u548c\u672f\u8bed',
                'amount': '\u91d1\u989d',
                'client': '\u5ba2\u6237',
                'client_email': '\u5ba2\u6237\u7535\u5b50\u90ae\u4ef6',
                'client_name': '\u5ba2\u6237\u7aef\u540d\u79f0',
                'discount': '\u6298\u6263',
                'discount_type': '\u6298\u6263\u7c7b\u578b',
                'download': '\u4e0b\u8f7d',
                'due_amount': '\u5230\u671f\u91d1\u989d',
                'due_date': '\u622a\u6b62\u65e5\u671f',
                'edit_invoice': '\u7f16\u8f91\u53d1\u7968',
                'invoice': '\u53d1\u7968',
                'invoice_date': '\u53d1\u7968\u65e5\u671f',
                'invoice_details': '\u53d1\u7968\u660e\u7ec6',
                'invoice_id': '\u53d1\u7968\u7f16\u53f7',
                'invoice_pdf': '\u53d1\u7968',
                'new_invoice': '\u65b0\u53d1\u7968',
                'note': '\u6ce8\u610f',
                'paid': '\u4ed8\u8d39',
                'payment': '\u4ed8\u6b3e',
                'payment_method': '\u4ed8\u6b3e\u65b9\u5f0f',
                'price': '\u4ef7\u683c',
                'print_invoice': '\u6253\u5370\u53d1\u7968',
                'qty': '\u6570\u91cf',
                'recurring': '\u518d\u6b21\u53d1\u751f\u7684',
                'remove_note_term': '\u5220\u9664\u6ce8\u91ca\u548c\u6761\u6b3e',
                'sub_total': '\u5c0f\u8ba1',
                'tax': '\u7a0e',
                'terms': '\u6761\u6b3e',
                'total': '\u603b\u8ba1',
                'total_tax': '\u7a0e',
                'transactions': '\u4ea4\u6613',
            },
            'invoice_templates': '\u53d1\u7968\u6a21\u677f',
            'invoices': '\u53d1\u7968',
            'language': '\u8bed\u8a00',
            'notification': {
                'mark_all_as_read': '\u6807\u8bb0\u4e3a\u5df2\u8bfb',
                'notifications': '\u901a\u77e5',
                'you_don`t_have_any_new_notification': '\u60a8\u6ca1\u6709\u4efb\u4f55\u65b0\u901a\u77e5',
            },
            'payment': {
                'add_payment': '\u6dfb\u52a0\u4ed8\u6b3e',
                'payable_amount': '\u5e94\u4ed8\u91d1\u989d',
                'payment_date': '\u4ed8\u6b3e\u65e5\u671f',
                'payment_mode': '\u4ed8\u6b3e\u65b9\u5f0f',
                'payment_type': '\u4ed8\u6b3e\u7c7b\u578b',
                'transaction_id': '\u4ea4\u6613ID',
            },
            'product': {
                'add_product': '\u6dfb\u52a0\u4ea7\u54c1',
                'category': '\u7c7b\u522b',
                'code': '\u4ea7\u54c1\u4ee3\u7801',
                'description': '\u8bf4\u660e',
                'edit_product': '\u7f16\u8f91\u4ea7\u54c1',
                'image': '\u56fe\u50cf',
                'name': '\u59d3\u540d',
                'price': '\u4ef7\u683c',
                'product': '\u4ea7\u54c1',
                'product_name': '\u4ea7\u54c1\u540d\u79f0',
                'unit_price': '\u5355\u4ef7',
                'updated_at': '\u66f4\u65b0\u65f6\u95f4',
            },
            'products': '\u4ea7\u54c1',
            'roles': '\u89d2\u8272',
            'setting': {
                'address': '\u5730\u5740',
                'app_logo': '\u5e94\u7528\u6807\u5fd7',
                'app_name': '\u5e94\u7528\u540d\u79f0',
                'clinic_name': '\u8bca\u6240\u540d\u79f0',
                'color': '\u989c\u8272',
                'company_address': '\u516c\u53f8\u5730\u5740',
                'company_image_validation': '\u56fe\u50cf\u7684\u50cf\u7d20\u5fc5\u987b\u4e3a 210 x 50\u3002',
                'company_logo': '\u516c\u53f8\u6807\u5fd7',
                'company_name': '\u516c\u53f8\u540d\u79f0',
                'company_phone': '\u516c\u53f8\u7535\u8bdd',
                'contact_information': '\u8054\u7cfb\u4fe1\u606f',
                'currency': '\u8d27\u5e01',
                'currency_settings': '\u8d27\u5e01\u8bbe\u7f6e',
                'date_format': '\u65e5\u671f\u683c\u5f0f',
                'decimal_separator': '\u5341\u8fdb\u5236\u5206\u9694\u7b26',
                'fav_icon': '\u6536\u85cf\u5939\u56fe\u6807',
                'general': '\u4e00\u822c',
                'general_details': '\u4e00\u822c\u8be6\u7ec6\u4fe1\u606f',
                'image_validation': '\u56fe\u50cf\u5fc5\u987b\u4e3a 90 x 60 \u50cf\u7d20\u3002',
                'invoice_template': '\u53d1\u7968\u6a21\u677f',
                'postal_code': '\u90ae\u653f\u7f16\u7801',
                'prefix': '\u524d\u7f00',
                'setting': '\u8bbe\u7f6e',
                'specialities': '\u4e13\u4e1a',
                'thousand_separator': '\u5343\u4f4d\u5206\u9694\u7b26',
                'time_format': '\u65f6\u95f4\u683c\u5f0f',
                'timezone': '\u65f6\u533a',
            },
            'settings': '\u8bbe\u7f6e',
            'sign_out': '\u9000\u51fa',
            'states': '\u5dde',
            'tax': {
                'add_tax': '\u52a0\u7a0e',
                'edit_tax': '\u7f16\u8f91\u7a0e',
                'is_default': '\u662f\u9ed8\u8ba4\u503c',
                'no': '\u4e0d',
                'tax': '\u7a0e',
                'yes': '\u662f',
            },
            'taxes': '\u7a0e\u6536',
            'transactions': '\u4ea4\u6613',
            'user': {
                'account': '\u8d26\u6237',
                'account_setting': '\u8d26\u6237\u8bbe\u7f6e',
                'avatar': '\u5934\u50cf',
                'change_password': '\u4fee\u6539\u5bc6\u7801',
                'confirm_password': '\u786e\u8ba4\u5bc6\u7801',
                'contact_number': '\u8054\u7cfb\u7535\u8bdd',
                'current_password': '\u5f53\u524d\u5bc6\u7801',
                'email': '\u7535\u5b50\u90ae\u4ef6',
                'full_name': '\u5168\u540d',
                'gender': '\u6027\u522b',
                'new_password': '\u65b0\u5bc6\u7801',
                'phone': '\u7535\u8bdd',
                'profile': '\u4e2a\u4eba\u8d44\u6599',
                'profile_details': '\u4e2a\u4eba\u8d44\u6599\u8be6\u60c5',
                'save_changes': '\u4fdd\u5b58\u66f4\u6539',
                'setting': '\u8bbe\u7f6e',
                'user_details': '\u7528\u6237\u8be6\u7ec6\u4fe1\u606f',
            },
            'users': '\u7528\u6237',
        },
    });
})();

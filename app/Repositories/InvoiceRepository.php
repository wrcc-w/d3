<?php

namespace App\Repositories;

use App\Mail\InvoiceCreateClientMail;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoiceItemTax;
use App\Models\InvoiceSetting;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Tax;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class InvoiceRepository
 */
class InvoiceRepository extends BaseRepository
{

    /**
     * @var string[]
     */
    public $fieldSearchable = [

    ];

    /**
     *
     * @return array|string[]
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     *
     * @return string
     */
    public function model(): string
    {
        return Invoice::class;
    }

    /**
     * @return array
     */
    public function getSyncList($invoice = [])
    {
        $data['products'] = Product::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        if (!empty($invoice)) {
            $data['productItem'] = InvoiceItem::when($invoice, function ($q) use ($invoice) {
                $q->whereInvoiceId($invoice[0]->id);
            })->whereNotNull('product_name')->pluck('product_name',
                'product_name')->toArray();
            $data['products'] += $data['productItem'];
        }
        $data['associateProducts'] = $this->getAssociateProductList($invoice);

        $data['clients'] = User::role(Role::ROLE_CLIENT)->get()->pluck('full_name', 'id')->toArray();

        $data['discount_type'] = Invoice::DISCOUNT_TYPE;
        $invoiceStatusArr = Invoice::STATUS_ARR;
        unset($invoiceStatusArr[Invoice::STATUS_ALL]);
        $invoiceRecurringArr = Invoice::RECURRING_ARR;
        $data['statusArr'] = $invoiceStatusArr;
        $data['recurringArr'] = $invoiceRecurringArr;
        $data['taxes'] = Tax::get();
        $data['defaultTax'] = getDefaultTax();
        $data['associateTaxes'] = $this->getAssociateTaxList();
        $data['template'] = InvoiceSetting::pluck('template_name', 'id');

        return $data;
    }

    /**
     * @param  array  $invoice
     *
     * @return array
     */
    public function getAssociateProductList($invoice = []): array
    {
        $result = Product::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        if (!empty($invoice)) {
            $invoiceItem = InvoiceItem::when($invoice, function ($q) use ($invoice) {
                $q->whereInvoiceId($invoice[0]->id);
            })->whereNotNull('product_name')->pluck('product_name', 'product_name')->toArray();
            $result += $invoiceItem;
        }
        $products = [];
        foreach ($result as $key => $item) {
            $products[] = [
                'key'   => $key,
                'value' => $item,
            ];
        }

        return $products;
    }

    /**
     * @return array
     */
    public function getAssociateTaxList(): array
    {
        $result = Tax::get();
        $taxes = [];
        foreach ($result as $item) {
            $taxes[] = [
                'id'         => $item->id,
                'name'       => $item->name,
                'value'      => $item->value,
                'is_default' => $item->is_default,
            ];
        }

        return $taxes;
    }

    /**
     * @param array $input
     *
     * @return Invoice
     */
    public function saveInvoice(array $input)
    {
        try {
            DB::beginTransaction();
            $input['tax_id'] = json_decode($input['tax_id']);
            $input['tax'] = json_decode($input['tax']);
            $input['final_amount'] = $input['amount'];
            if ($input['final_amount'] == "NaN") {
                $input['final_amount'] = 0;
            }
            $invoiceItemInputArray = Arr::only($input, ['product_id', 'quantity', 'price', 'tax', 'tax_id']);
            $invoiceExist = Invoice::where('invoice_id', $input['invoice_id'])->exists();
            $invoiceItemInput = $this->prepareInputForInvoiceItem($invoiceItemInputArray);
            $total = [];
            foreach ($invoiceItemInput as $key => $value) {
                $total[] = $value['price'] * $value['quantity'];
            }
            if (!empty($input['discount'])) {
                if (array_sum($total) <= $input['discount']) {
                    throw new UnprocessableEntityHttpException('Discount amount should not be greater than sub total.');
                }
            }
            if ($invoiceExist) {
                throw new UnprocessableEntityHttpException('Invoice id already exist');
            }

            $input = Arr::only($input, [
                'invoice_id', 'invoice_date', 'due_date', 'discount_type', 'discount', 'final_amount',
                'note', 'term', 'template_id', 'status', 'tax_id', 'tax', 'tenant_id', 'client_id',
            ]);

            /** @var Client $clientUser */
            $clientUser = Client::whereUserId($input['client_id'])->first();
            $input['client_id'] = $clientUser->id;

            /** @var Invoice $invoice */
            $invoice = Invoice::create($input);
            $totalAmount = 0;
            $products = Product::pluck('id')->toArray();
            foreach ($invoiceItemInput as $key => $data) {
                $validator = Validator::make($data, InvoiceItem::$rules);

                if ($validator->fails()) {
                    throw new UnprocessableEntityHttpException($validator->errors()->first());
                }
                $data['product_name'] = is_numeric($data['product_id']);
                if(in_array($data['product_id'],$products)){
                    $data['product_name'] = null;
                }else{
                    $data['product_name'] = $data['product_id'];
                    $data['product_id'] = null;
                }
                $data['amount'] = $data['price'] * $data['quantity'];
                if ($data['tax'] != null || $data['tax'] != 0) {

                    $data['total'] = $data['amount'] + ($data['amount'] * array_sum($data['tax'])) / 100;
                    $totalAmount += $data['total'];
                } else {
                    $data['total'] = $data['amount'];
                    $totalAmount += $data['amount'];
                }
                /** @var InvoiceItem Items $invoiceItem */
                $invoiceItem = new InvoiceItem($data);

                $invoiceItems = $invoice->invoiceItems()->save($invoiceItem);

                $invoiceItemTaxIds = ($input['tax_id'][$key] != 0) ? $input['tax_id'][$key] : $input['tax_id'][$key] = [0 => 0];
                $invoiceItemTaxes = ($input['tax'][$key] != 0) ? $input['tax'][$key] : $input['tax'][$key] = [0 => null];


                foreach ($invoiceItemTaxes as $index => $tax) {
                    InvoiceItemTax::create([
                        'invoice_item_id' => $invoiceItems->id,
                        'tax_id'          => $invoiceItemTaxIds[$index],
                        'tax'             => $tax,
                    ]);
                }
            }

            $invoice->amount = $totalAmount;
            $invoice->save();

            DB::commit();
            if ($invoice->status != Invoice::DRAFT) {
                $input['invoiceData'] = $invoice;
                $input['clientData'] = $invoice->client->user;

                if (getSettingValue('mail_notification')) {
                    Mail::to($input['clientData']['email'])->send(new InvoiceCreateClientMail($input));
                }
            }

            return $invoice;
        } catch (Exception $exception) {
            throw new UnprocessableEntityHttpException($exception->getMessage());
        }
    }

    /**
     * @param array $input
     *
     * @return array
     */
    public function prepareInputForInvoiceItem(array $input): array
    {
        $items = [];
        foreach ($input as $key => $data) {
            foreach ($data as $index => $value) {
                $items[$index][$key] = $value;
                if (!(isset($items[$index]['price']) && $key == 'price')) {
                    continue;
                }
                $items[$index]['price'] = removeCommaFromNumbers($items[$index]['price']);
            }
        }

        return $items;
    }

    /**
     * @param $invoiceId
     * @param $input
     *
     * @return Invoice|Builder|Builder[]|Collection|Model
     */
    public function updateInvoice($invoiceId, $input)
    {
        try {
            DB::beginTransaction();
            $input['tax_id'] = json_decode($input['tax_id']);
            $input['tax'] = json_decode($input['tax']);
            if ($input['discount_type'] == 0) {
                $input['discount'] = 0;
            }
            $input['final_amount'] = $input['amount'];
            $invoiceItemInputArr = Arr::only($input, ['product_id', 'quantity', 'price', 'tax', 'tax_id', 'id']);
            $invoiceItemInput = $this->prepareInputForInvoiceItem($invoiceItemInputArr);
            $total = [];
            foreach ($invoiceItemInput as $key => $value) {
                $total[] = $value['price'] * $value['quantity'];
            }
            if (!empty($input['discount'])) {
                if (array_sum($total) <= $input['discount']) {
                    throw new UnprocessableEntityHttpException('Discount amount should not be greater than sub total.');
                }
            }

            /** @var Invoice $invoice */
            $clientUser = Client::whereUserId($input['client_id'])->first();
            $input['client_id'] = $clientUser->id;
            $invoice = $this->update(Arr::only($input,
                [
                    'invoice_date', 'due_date', 'discount_type', 'discount', 'final_amount', 'note',
                    'term', 'template_id',
                    'status', 'tax_id', 'tax', 'tenant_id', 'client_id',
                ]), $invoiceId);
            $totalAmount = 0;
            $products = Product::pluck('id')->toArray();
            foreach ($invoiceItemInput as $key => $data) {
                $validator = Validator::make($data, InvoiceItem::$rules, [
                    'product_id.integer' => 'Please select a Product',
                ]);
                if ($validator->fails()) {
                    throw new UnprocessableEntityHttpException($validator->errors()->first());
                }
                $data['product_name'] = is_numeric($data['product_id']);
                if(in_array($data['product_id'],$products)){
                    $data['product_name'] = null;
                }else{
                    $data['product_name'] = $data['product_id'];
                    $data['product_id'] = null;
                }
                $data['amount'] = $data['price'] * $data['quantity'];
                if ($data['tax'] != null || $data['tax'] != 0) {
                    $data['total'] = $data['amount'] + ($data['amount'] * array_sum($data['tax'])) / 100;
                    $totalAmount += $data['total'];
                } else {
                    $data['total'] = $data['amount'];
                    $totalAmount += $data['amount'];
                }
                $invoiceItemInput[$key] = $data;
            }
            /** @var InvoiceItemRepository $invoiceItemRepo */
            $invoiceItemRepo = app(InvoiceItemRepository::class);
            $invoiceItemRepo->updateInvoiceItem($invoiceItemInput, $invoice->id);
            $invoice->amount = $totalAmount;
            $invoice->save();

            $changes = $invoice->getChanges();
            if (isset($changes['due_date']) && $invoice->status == Invoice::OVERDUE) {
                $invoice->update([
                    'status' => Invoice::UNPAID
                ]);
            }
            
            if ($input['invoiceStatus'] === "1") {
                if (count($changes) > 0) {
                    $this->updateNotification($invoice, $input, $changes);
                }
                if ($input['status'] == Invoice::DRAFT) {
                    $this->draftStatusUpdate($invoice);
                }
            }

            DB::commit();

            return $invoice;
        } catch (Exception $exception) {
            throw new UnprocessableEntityHttpException($exception->getMessage());
        }
    }

    /**
     * @param $invoice
     *
     * @return array
     */
    public function getInvoiceData($invoice): array
    {
        $data = [];

        $invoice = Invoice::with([
            'client',
            'user',
            'payments',
            'invoiceItems' => function ($query) {
                $query->with(['product', 'invoiceItemTax']);
            },
        ])->whereId($invoice->id)->firstOrFail();


        $data['invoice'] = $invoice;
        $invoiceItems = $invoice->invoiceItems;
        $data['totalTax'] = [];

        foreach ($invoiceItems as $keys => $item) {
            $totalTax = $item->invoiceItemTax->sum('tax');
            $data['totalTax'][] = $item['quantity'] * $item['price'] * $totalTax / 100;
        }

        return $data;
    }

    /**
     * @param $invoice
     *
     * @return array
     */
    public function prepareEditFormData($invoice): array
    {
        /** @var Invoice $invoice */
        $invoice = Invoice::with([
            'invoiceItems' => function ($query) {
                $query->with(['invoiceItemTax']);
            },
            'client',
        ])->whereId($invoice->id)->firstOrFail();

        $data = $this->getSyncList([$invoice]);
        $data['client_id'] = $invoice->client->user_id;
        $data['invoice'] = $invoice;

        $invoiceItems = $invoice->invoiceItems;

        $data['selectedTaxes'] = [];
        foreach ($invoiceItems as $invoiceItem) {
            $invoiceItemTaxes = $invoiceItem->invoiceItemTax;
            foreach ($invoiceItemTaxes as $invoiceItemTax) {
                $data['selectedTaxes'][$invoiceItem->id][] = $invoiceItemTax->tax_id;
            }
        }

        return $data;
    }

    public function getDefaultTemplate($invoice)
    {
        $invoiceSetting = DB::table('invoice-settings')->where('id', $invoice['template_id'])->first();
        $data['invoice_template_name'] = $invoiceSetting->key;

        return $data['invoice_template_name'];
    }

    /**
     * @param $invoice
     *
     * @return array
     */
    public function getPdfData($invoice): array
    {
        $data = [];
        $data['invoice'] = $invoice;
        $data['client'] = $invoice->client;
        $invoiceItems = $invoice->invoiceItems;
        $invoiceSetting = DB::table('invoice-settings')->where('id', $invoice['template_id'])->first();
        $data['invoice_template_color'] = $invoiceSetting->template_color;
        $data['totalTax'] = [];

        foreach ($invoiceItems as $keys => $item) {
            $totalTax = $item->invoiceItemTax->sum('tax');
            $data['totalTax'][] = $item['quantity'] * $item['price'] * $totalTax / 100;
        }

        if (!Auth::check()) {
            $data['setting'] = Setting::pluck('value',
                'key')->toArray();
        } else {
            $user = Auth::user();
            if ($user->hasRole(\App\Models\Role::ROLE_CLIENT)) {
                $data['setting'] = Setting::where('tenant_id', getClientAdminTenantId())->pluck('value',
                    'key')->toArray();
            } else {
                $data['setting'] = Setting::pluck('value', 'key')->toArray();
            }
        }

        return $data;
    }

    /**
     * @param array $input
     */
    public function saveNotification($input)
    {
        $userId = $input['client_id'];

        $title = "New invoice created #".$input['invoice_id'].".";
        if ($input['status'] != Invoice::DRAFT) {
            addNotification([
                Notification::NOTIFICATION_TYPE['Invoice Created'],
                $userId,
                $title,
            ]);
        }
    }

    /**
     * @param $invoice
     * @param $input
     *
     * @param array $changes
     *
     */
    public function updateNotification($invoice, $input, array $changes = [])
    {
        $invoice->load('client.user');
        $userId = $invoice->client->user_id;
        $title = "Your invoice #".$invoice->invoice_id." was updated.";
        if ($input['status'] != Invoice::DRAFT) {
            if (isset($changes['status'])) {
                $title = "Status of your invoice #".$invoice->invoice_id." was updated.";
            }
            addNotification([
                Notification::NOTIFICATION_TYPE['Invoice Updated'],
                $userId,
                $title,
            ]);
        }
    }

    /**
     * @param  Invoice  $invoice
     *
     * @return bool
     */
    public function draftStatusUpdate($invoice): bool
    {
        $invoice->update([
            'status' => Invoice::UNPAID,
        ]);
        $invoice->load('client.user');
        $userId = $invoice->client->user_id;
        $title = "Status of your invoice #".$invoice->invoice_id." was updated.";
        addNotification([
            Notification::NOTIFICATION_TYPE['Invoice Updated'],
            $userId,
            $title,
        ]);
        $input['invoiceData'] = $invoice->toArray();
        $input['clientData'] = $invoice->client->user;
        if (getSettingValue('mail_notification')) {
            Mail::to($invoice->client->user->email)->send(new InvoiceCreateClientMail($input));
        }

        return true;
    }
}

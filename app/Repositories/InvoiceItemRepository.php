<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoiceItemTax;
use Exception;

/**
 * Class InvoiceItemRepository
 * @version February 24, 2020, 5:57 am UTC
 */
class InvoiceItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'quantity',
        'price',
        'tax',
        'total',
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
        return InvoiceItem::class;
    }

    /**
     * @param  array  $invoiceItemInput
     * @param  int  $invoiceId
     *
     * @throws Exception
     */
    public function updateInvoiceItem(array $invoiceItemInput, $invoiceId)
    {
        /** @var Invoice $invoice */
        $invoice = Invoice::find($invoiceId);
        $invoiceItemIds = [];

        foreach ($invoiceItemInput as $key => $data) {
            if (isset($data['id']) && ! empty($data['id'])) {
                $invoiceItemIds[] = $data['id'];
                $this->update($data, $data['id']);
                $tax = ($data['tax'] != 0) ? $data['tax'] : $data['tax'] = [0 => null];
                $taxIds = ($data['tax_id'] != 0) ? $data['tax_id'] : $data['tax_id'] = [0 => 0];
                $this->addInvoiceItemTax($data['id'], $tax, $taxIds, true);
                $this->removeInvoiceItemTax($data['id'], $taxIds);
            } else {
                /** @var InvoiceItem $invoiceItem */
                $invoiceItem = new InvoiceItem($data);
                $invoiceItem = $invoice->invoiceItems()->save($invoiceItem);
                $tax = ($data['tax'] != 0) ? $data['tax'] : $data['tax'] = [0 => null];
                $taxIds = ($data['tax_id'] != 0) ? $data['tax_id'] : $data['tax_id'] = [0 => 0];
                $this->addInvoiceItemTax($invoiceItem->id, $tax, $taxIds);
                $invoiceItemIds[] = $invoiceItem->id;
            }
        }

        if (! (isset($invoiceItemIds) && count($invoiceItemIds))) {
            return;
        }

        InvoiceItem::whereNotIn('id', $invoiceItemIds)->whereInvoiceId($invoice->id)->delete();
    }

    /**
     * @param $invoiceItemId
     * @param $tax
     * @param $taxIds
     * @param  false  $checkDifference
     *
     * @return bool|void
     */
    public function addInvoiceItemTax($invoiceItemId, $tax, $taxIds, $checkDifference = false)
    {
        if (! $checkDifference) {
            foreach ($taxIds as $index => $value) {
                $invoiceItemTax = InvoiceItemTax::create([
                    'invoice_item_id' => $invoiceItemId,
                    'tax_id'          => $value,
                    'tax'             => $tax[$index],
                ]);
            }

            return true;
        }
        $invoiceItemTaxIds = InvoiceItemTax::whereInvoiceItemId($invoiceItemId)->pluck('tax_id')->toArray();;
        $taxDifference = array_diff($taxIds, $invoiceItemTaxIds);
        if (! is_null($taxDifference)) {
            foreach ($taxDifference as $index => $value) {
                $invoiceItemTax = InvoiceItemTax::create([
                    'invoice_item_id' => $invoiceItemId,
                    'tax_id'          => $value,
                    'tax'             => $tax[$index],
                ]);
            }
        }
    }

    /**
     * @param $invoiceItemId
     * @param $taxIds
     */
    public function removeInvoiceItemTax($invoiceItemId, $taxIds)
    {
        $invoiceItemTaxIds = InvoiceItemTax::whereInvoiceItemId($invoiceItemId)->pluck('tax_id')->toArray();
        $taxDifference = array_diff($invoiceItemTaxIds, $taxIds);
        foreach ($taxDifference as $index => $value) {
            InvoiceItemTax::whereInvoiceItemId($invoiceItemId)->whereTaxId($value)->delete();
        }
    }
}

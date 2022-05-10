<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ClientInvoiceTable extends LivewireTableComponent
{
    protected $model = Invoice::class;

    protected string $tableName = 'invoices';

    public $showButtonOnHeader = true;
    public $buttonComponent = 'client_panel.invoices.components.add-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);
    }

    public function columns(): array
    {
            return [
                Column::make(__('messages.invoice.invoice_id'), "invoice_id")
                    ->sortable()
                    ->searchable()
                    ->view('client_panel.invoices.components.invoice-id'),
                Column::make("invoice_id", "invoice_id")
                    ->sortable()
                    ->searchable()->hideIf(1),
                Column::make("Last Name", "client.user.last_name")
                    ->sortable()
                    ->searchable()->hideIf(1),
                Column::make(__('messages.invoice.invoice_date'), "invoice_date")
                    ->sortable()
                    ->searchable()
                    ->format(function ($value, $row, Column $column) {
                        return view('invoices.components.invoice-due-date')
                            ->withValue([
                                'invoice-date' => $row->invoice_date,
                            ]);
                    }),
                Column::make(__('messages.invoice.due_date'), "due_date")
                    ->sortable()
                    ->searchable()
                    ->format(function ($value, $row, Column $column) {
                        return view('invoices.components.invoice-due-date')
                            ->withValue([
                                'due-date' => $row->due_date,
                            ]);
                    }),
                Column::make(__('messages.invoice.amount'), "final_amount")
                    ->sortable()
                    ->searchable()
                    ->format(function ($value, $row, Column $column) {
                        return getCurrencySymbol().' '.numberFormat($row->final_amount);
                    }),
                Column::make(__('messages.invoice.transactions'), "amount")
                    ->searchable()
                    ->view('invoices.components.transaction'),
                Column::make(__('messages.common.status'), "status")
                    ->searchable()
                    ->view('invoices.components.transaction-status'),
                Column::make(__('messages.common.action'), "id")
                    ->view('livewire.client-invoice-action-button'),

            ];
    }

    public function builder(): Builder
    {
        $status = request()->input('status', null);
        $clientId = Auth::user()->client->id;

        $invoiceQuery = Invoice::with(['client.user', 'payments'])->where('invoices.client_id', $clientId)
            ->where('invoices.status', '!=', Invoice::DRAFT)
            ->select('invoices.*')
            ->when($status, function ($query, $status) {
                return $query->where('invoices.status', $status);
            })
            ->when($this->getAppliedFilterWithValue('invoices.status'), function ($query, $type) {
                return $query->where('invoices.status', $type);
            });

        return $invoiceQuery;
    }

    public function filters(): array {
        $status = Invoice::STATUS_ARR;
        unset($status[Invoice::STATUS_ALL]);
        return [
            SelectFilter::make(__('messages.common.status').':')
                ->options($status)
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('invoices.status','=', $value);
                }),
        ];
    }
}

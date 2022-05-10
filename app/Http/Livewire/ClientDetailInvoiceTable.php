<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ClientDetailInvoiceTable extends LivewireTableComponent
{
    protected $model = Invoice::class;

    public $clientId = null;

    public function mount(int $clientId): void
    {
        $this->clientId = $clientId;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);
        $this->setThAttributes(function (Column $column) {
            return [
                'class' => 'text-center',
            ];
        });

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if (in_array($column->getField(), ['status', 'amount'])) {
                return [
                    'class' => 'text-center',
                ];
            }
            return [
            ];
        });

    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.invoice.invoice_id'), "id")
                ->sortable()
                ->searchable()
                ->view('clients.components.invoice-id'),
            Column::make("invoice_id", "invoice_id")
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
        ];
    }

    public function builder(): Builder
    {
        return Invoice::where('client_id', $this->clientId)->with('payments');
    }
}

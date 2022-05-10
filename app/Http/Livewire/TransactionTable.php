<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class TransactionTable extends LivewireTableComponent
{
    protected $model = Payment::class;
    protected string $tableName = 'payments';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'transactions.components.export-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('payment_mode')) {
                return [
                    'class' => 'text-center w-12',
                ];
            }
            if ($column->isField('first_name')) {
                return [
                    'class' => 'w-35',
                ];
            }
            if ($column->isField('amount')) {
                return [
                    'class' => 'w-15',
                ];
            }
            return [];
        });
        $this->setTdAttributes(function (Column $column) {
            if($column->getField() === 'payment_mode') {
                return [
                    'class' => 'text-center',
                ];
            }
            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.invoice.invoice_id'), "invoice.invoice_id")
                ->sortable()
                ->searchable()
                ->format(function ($value, $row, Column $column) {
                    return view('transactions.components.invoice-id-payment-date')
                        ->withValue([
                            'invoice-id-route' => route('invoices.show', $row->invoice->id),
                            'invoice-id' => $row->invoice->invoice_id
                        ]);
                }),
            Column::make(__('messages.invoice.client'), "invoice.client.user.first_name")
                ->sortable()
                ->searchable()
                ->view('transactions.components.client-name'),
            Column::make("Last Name", "invoice.client.user.last_name")
                ->sortable()
                ->searchable()
                ->hideif('admin'),
            Column::make(__('messages.payment.payment_date'), "payment_date")
                ->sortable()
                ->searchable()
                ->format(function ($value, $row, Column $column) {
                    return view('transactions.components.invoice-id-payment-date')
                        ->withValue([
                            'payment-date' => $row->payment_date
                        ]);
                }),
            Column::make(__('messages.invoice.amount'), "amount")
                ->sortable()
                ->searchable()
                ->format(function ($value, $row, Column $column) {
                    return getCurrencySymbol().' '.numberFormat($row->amount);
                }),
            Column::make(__('messages.invoice.payment_method'), "payment_mode")
                ->searchable()
                ->view('transactions.components.payment-mode'),
        ];
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        return Payment::with('invoice.client.user')->select('payments.*');
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        $paymentMethod = Payment::PAYMENT_MODE;
        return [
            SelectFilter::make(__('messages.payment.payment_method').':')
                ->options($paymentMethod)
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('payment_mode', $value);
                }),
        ];
    }
}

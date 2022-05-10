<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ClientTransactionTable extends LivewireTableComponent
{
    protected $model = Payment::class;
    protected string $tableName = 'payments';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'client_panel.transactions.components.export-button';

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
            if (in_array($column->getField(), ['payment_mode'])) {
                return [
                    'class' => 'text-center',
                ];
            }
            if(in_array($column->getField(), ['invoice_id','amount'])){
                return [
                    'class' => 'w-25',
                ];
            }
            if(in_array($column->getField(), ['payment_date'])){
                return [
                    'class' => 'w-35',
                ];
            }
            return [
            ];
        });

    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.invoice.invoice_id'), "invoice.invoice_id")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return view('transactions.components.invoice-id-payment-date')
                        ->withValue([
                            'invoice-id-route' =>  route('client.invoices.show',$row->invoice->id),
                            'invoice-id' => $row->invoice->invoice_id
                        ]);
                }),
            Column::make("Last Name", "invoice.client.user.last_name")
                ->sortable()
                ->searchable()
                ->hideif('admin'),
            Column::make(__('messages.payment.payment_date'), "payment_date")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return view('transactions.components.invoice-id-payment-date')
                        ->withValue([
                            'payment-date' => $row->payment_date
                        ]);
                }),
            Column::make(__('messages.invoice.amount'), "amount")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column){
                    return getCurrencySymbol().' '.numberFormat($row->amount);
                }),
            Column::make(__('messages.invoice.payment_method') , "payment_mode")
                ->searchable()
                ->view('transactions.components.payment-mode'),
        ];
    }
    public function builder(): Builder
    {
        return Payment::with('invoice.client.user')->whereHas('invoice.client')
            ->where('payments.user_id', Auth::id())->select('payments.*');
    }

    public function filters(): array {
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

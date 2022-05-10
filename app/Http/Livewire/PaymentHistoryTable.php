<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PaymentHistoryTable extends LivewireTableComponent
{
    protected $model = Payment::class;

    public $invoiceId = null;
    
    public function mount(int $invoiceId): void
    {
        $this->invoiceId = $invoiceId;
    }
    
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if (in_array($column->getField(), ['payment_date'])) {
                return [
                    'class' => 'w-50',
                ];
            }
            if (in_array($column->getField(), ['amount'])) {
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
            Column::make(__('messages.payment.payment_date'), "payment_date")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return view('transactions.components.invoice-id-payment-date')
                        ->withValue([
                            'payment-date' => $row->payment_date
                        ]);
                }),
            Column::make(__('messages.invoice.paid_amount'), "amount")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column){
                    return getCurrencySymbol().' '.numberFormat($row->amount);
                }),
            Column::make(__('messages.payment.payment_mode') , "payment_mode")
                ->searchable()
                ->view('transactions.components.payment-mode'),
        ];
    }
    public function builder(): Builder
    {
        $query  =  Payment::where('invoice_id',$this->invoiceId);

        return $query;
    }
}

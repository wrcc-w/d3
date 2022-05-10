<?php

namespace App\Http\Livewire;

use App\Models\AdminPayment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AdminPaymentTable extends LivewireTableComponent
{
    protected $model = AdminPayment::class;
    protected string $tableName = 'admin_payments';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'payments.components.add-button';

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
            if ($columnIndex == '6') {
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
            Column::make(__('messages.invoices'), "invoice_id")
                ->sortable()
                ->searchable()
                ->view('payments.components.client-name'), 
            Column::make("First Name", "invoice.client.user.first_name")
                ->sortable()
                ->searchable()
            ->hideIf(1),  
            Column::make("First Name", "invoice.invoice_id")
                ->sortable()
                ->searchable()
                ->hideIf(1), 
            Column::make("Last Name", "invoice.client.user.last_name")
                ->sortable()
                ->searchable()
                ->hideIf(1),
            Column::make(__('messages.payment.payment_date'), "payment_date")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return view('transactions.components.invoice-id-payment-date')
                        ->withValue([
                            'payment-date' => $row->payment_date
                        ]);
                }),
            Column::make(__('messages.invoice.amount') , "amount")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column){
                    return getCurrencySymbol().' '.numberFormat($row->amount);
                }),

            Column::make(__('messages.invoice.payment_method'), "payment_mode")
                ->sortable()
                ->searchable()
                ->label(function($row, Column $column){
                 return  ($row->payment_mode  == 4)  ? '<span class="badge badge-light-info fs-7">Cash</span>' : '';
                 })
                 ->html(),
            Column::make(__('messages.common.action'), "id")
                ->format(function($value, $row, Column $column) {
                    return view('livewire.modal-action-button')
                        ->withValue([
                            'data-id' => $row->id,
                        ]);
                }),
        ];
    }
    public function builder(): Builder
    {
        $query = AdminPayment::with(['invoice.client.user'])->select('admin_payments.*');

        return $query;  
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CurrencyTable extends LivewireTableComponent
{
    protected $model = Currency::class;
    protected string $tableName = 'currencies';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'currencies.components.add-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);
        $this->setThAttributes(function (Column $column) {
            if ($column->isField('id')) {
                return [
                    'class' => 'd-flex justify-end p-r-23',
                ];
            }
            if ($column->isField('icon')) {
                return [
                    'class' => 'w-25',
                ];
            }

            return [];
        });
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if (in_array($column->getField(), ['id'])) {
                return [
                    'class' => 'd-flex justify-end',
                ];
            }

            return [
            ];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.currency.icon'), "icon")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.currency.currency_code'), "code")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->format(function ($value, $row, Column $column) {
                    return view('livewire.modal-action-button')
                        ->withValue([
                            'data-id' => $row->id,
                        ]);
                }),
        ];
    }
}

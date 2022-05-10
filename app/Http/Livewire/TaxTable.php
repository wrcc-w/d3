<?php

namespace App\Http\Livewire;

use App\Models\Tax;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TaxTable extends LivewireTableComponent
{
    protected $model = Tax::class;

    protected string $tableName = 'taxes';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'taxes.components.add-button';

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
            if ($column->getField() === 'name') {
                return [
                    'class' => 'w-50',
                ];
            }
            if ($column->getField() === 'value') {
                return [
                    'class' => 'w-25',
                ];
            }
            if ($column->getField() === 'is_default') {
                return [
                    'class' => 'text-left',
                ];
            }

            return [];
        });
        $this->setThAttributes(function (Column $column) {
            return [
                'class' => 'text-center',
            ];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.value'), "value")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column){
                    return $row->value.'%';
                }),
            Column::make(__('messages.common.default'), "is_default")
                ->view('taxes.components.default'),
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
        return Tax::query()->select('taxes.*');
    }
}

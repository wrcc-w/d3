<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProductTable extends LivewireTableComponent
{
    protected $model = Product::class;
    protected string $tableName = 'products';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'products.components.add-button';


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
            return [];
        });
        $this->setTdAttributes(function (Column $column) {
            if($column->getField() === 'id') {
                return [
                    'class' => 'text-end',
                ];
            }
            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.product.product_name'), "name")
                ->sortable()
                ->searchable()
                ->view('products.components.product-name'),
            Column::make(__('messages.product.category'), "category.name")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column){
                    return $row->category->name;
                }),
            Column::make(__('messages.product.price'), "unit_price")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column){
                    return getCurrencySymbol().' '.numberFormat($row->unit_price);
                }),
            Column::make(__('messages.common.action'), "id")
                ->format(function($value, $row, Column $column) {
                    return view('livewire.action-button')
                        ->withValue([
                            'edit-route' => route('products.edit', $row->id),
                            'data-id' => $row->id
                        ]);
                })
        ];
    }

    public  function  builder(): Builder
    {
        return Product::with('category')->with('media')->select('products.*');
    }
}

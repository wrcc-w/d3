<?php

namespace App\Http\Livewire;

use App\Models\AdminTestimonial;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class AdminTestimonialTable extends LivewireTableComponent
{
    protected $model = AdminTestimonial::class;

    protected string $tableName = 'admin_testimonials';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'landing.testimonial.components.add-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('id')) {
                return [
                    'class' => 'd-flex justify-end m-r-35',
                ];
            }

            return [];
        });
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if (in_array($column->getField(), ['profile'])) {
                return [
                    'class' => 'w-35',
                ];
            }
            if (in_array($column->getField(), ['profile'])) {
                return [
                    'class' => 'w-25',
                ];
            }
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
            ImageColumn::make(__('messages.profile'))
                ->location(function($row){
                    return $row->image_url;
                })
                ->attributes(function($row) {
                    $data =['class' => 'user-img image-stretching',
                    'alt' => $row->name,];
                    return $data;
                }),
            Column::make(__('messages.testimonial.name'), "name")
                ->sortable()
                ->searchable()
                ->view('landing.testimonial.components.name'),
            Column::make(__('messages.testimonial.designation'),"position")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->format(function($value, $row, Column $column) {
                    return view('livewire.modal-action-button')
                        ->withValue([
                            'show-route' => $row->id,
                            'data-id' => $row->id,
                        ]);
                }),
             ];
    }
    public function builder(): Builder
    {
       return AdminTestimonial::with('media')->select('admin_testimonials.*');
    }

}

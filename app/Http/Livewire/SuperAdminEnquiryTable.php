<?php

namespace App\Http\Livewire;

use App\Models\SuperAdminEnquiry;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class SuperAdminEnquiryTable extends LivewireTableComponent
{
    protected $model = SuperAdminEnquiry::class;
    protected string $tableName = 'super_admin_enquiries';
    public $selectedStatus = '';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);

        $this->setTdAttributes(function (Column $column) {
            if ($column->getTitle() === 'Message') {
                return [
                    'class' => 'w-50',
                ];
            }
            if ($column->getTitle() === 'Name') {
                return [
                    'class' => 'text-black',
                ];
            }
            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.enquiry.name'), "full_name")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.enquiry.message'), "message")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.enquiry.read') . '/' . __('messages.enquiry.unread'), "status")
                ->sortable()
                ->searchable()
                ->label(function($row, Column $column){
                    return  $row->status  ? '<div class="badge badge-light-success">Read</div>' : '<div class="badge badge-light-danger">Unread</div>';
                })
                ->html(),
            Column::make(__('messages.common.action'), "id")
                ->format(function($value, $row, Column $column) {
                    return view('livewire.action-button')
                        ->withValue([
                            'show-route' => route('super.admin.enquiry.show', $row->id),
                            'data-id' => $row->id
                        ]);
                })
        ];
    }

    public function builder(): Builder
    {
        $query = SuperAdminEnquiry::select('super_admin_enquiries.*')
            ->when($this->getAppliedFilterWithValue('status'), function ($query, $type){
                return $query->where('status', $type);
            });

        return $query;

    }
    public function filters(): array {
        $status = SuperAdminEnquiry::STATUS_ARR;
        unset($status[SuperAdminEnquiry::ALL]);
        return [
            SelectFilter::make(__('messages.common.status').':')
                ->options($status)
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('status', $value);
                }),
        ];
    }

}

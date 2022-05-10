<?php

namespace App\Http\Livewire;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class SubscriptionPlanTable extends LivewireTableComponent
{
    protected $model = SubscriptionPlan::class;
    protected string $tableName = 'subscription_plans';

    // for table header button

    public $showButtonOnHeader = true;
    public $buttonComponent = 'subscription_plans.components.add-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);
        $this->setThAttributes(function (Column $column) {
            if (in_array($column->getTitle(), ['Active Plans', 'Make Default', 'Action'])) {
                return [
                    'class' => 'text-center livewire-th-center',
                ];
            }

            return [];
        });
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($columnIndex > 4) {
                return [
                    'class' => 'text-center',
                ];
            }

            return [
                'class' => 'text-left',
            ];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.subscription_plans.name'), "name")
                ->sortable()->searchable(),
            Column::make("Currency", "currency")
                ->sortable()->hideIf(1),
            Column::make(__('messages.subscription_plans.price'), "price")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column){
                    return getSubscriptionPlanCurrencyIcon($row->currency) . ' ' . $row->price;
                }),
            Column::make(__('messages.subscription_plans.frequency'), "frequency")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column){
                    return $row->frequency == 1 ? 'Month' : 'Year';
                }),
            Column::make(__('messages.subscription_plans.trail_plan'), "trial_days")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column){
                    return $row->trial_days . ' Days';
                }),
            Column::make(__('messages.subscription_plans.active_plan'), "id")
                ->sortable()
                ->searchable()
                ->label(function($row, Column $column){
                    return '<span class="badge badge-light-info fs-7">'.$row->subscription->count().'</span>';
                })
                ->html(),
            Column::make(__('messages.subscription_plans.make_default'), "is_default")
                ->sortable()
                ->searchable()
                ->view('subscription_plans.components.default'),
            Column::make(__('messages.common.action'), "id")
                ->view('livewire.subscription-plan-action'),
        ];
    }

    public function builder(): Builder
    {
        $query = SubscriptionPlan::with('subscription')
            ->when($this->getAppliedFilterWithValue('frequency'), function ($query, $type) {
                return $query->where('frequency', $type);
            });

        return $query;
    }

    public function filters(): array {
        $planType = SubscriptionPlan::PLAN_TYPE;
        return [
            SelectFilter::make(__('messages.subscription_plans.plan_type').':')
                ->options($planType)
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('frequency', '=', $value);
                }),
        ];
    }
}

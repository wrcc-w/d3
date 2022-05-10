<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class FaqTable extends LivewireTableComponent
{
    protected $model = Faq::class;
    protected string $tableName = 'faqs';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'landing.faqs.components.add-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);

        $this->setThAttributes(function (Column $column) {
            if ($column->getTitle() === 'Action') {
                return [
                    'class' => 'text-center',
                ];
            }

            return [
                'class' => 'w-100',
            ];
        });
    }

    public function columns(): array
    {
        return [
            Column::make("Question", "question")
                ->sortable()
                ->searchable()
                ->view('landing.faqs.components.question'),
            Column::make(__('messages.common.action'), "id")
            ->format(function($value, $row, Column $column) {
                return view('livewire.modal-action-button')->withValue(
                    [
                        'show-route' => $row->id,
                        'data-id' => $row->id,
                    ]
                );
            }),
        ];
    }

    public function builder(): Builder
    {
        return Faq::query()->select('faqs.*');
    }
}

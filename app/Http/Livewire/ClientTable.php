<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ClientTable extends LivewireTableComponent
{
    protected $model = Client::class;
    protected string $tableName = 'clients';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'clients.components.add-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if($column->getField() === 'first_name') {
                return [
                    'class' => 'w-75',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.client.client'), "user.first_name")
                ->sortable()
                ->searchable()
                ->view('clients.components.full_name'),
            Column::make("last_name", "user.last_name")
                ->sortable()
                ->searchable()
                ->hideIf(1),
            Column::make("Invoice", "website")
                ->sortable()
                ->searchable()
                ->view('clients.components.invoice-count'),
            Column::make(__('messages.common.action'), "id")
                ->format(function($value, $row, Column $column) {
                    return view('livewire.action-button')
                        ->withValue([
                            'edit-route' => route('clients.edit', $row->id),
                            'data-id' => $row->id
                        ]);
                }),
        ];
    }

    public function builder(): Builder
    {
        $query = Client::with(['user.media', 'country', 'state', 'city'])->withCount('invoices');

        return $query;
    }
}

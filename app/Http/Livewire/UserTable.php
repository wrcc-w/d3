<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends LivewireTableComponent
{
    protected $model = User::class;

    protected string $tableName = 'users';

    // for table header button
    public $showButtonOnHeader = true;
    public $buttonComponent = 'users.table-components.add-button';

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
            if ($columnIndex == '5') {
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
            Column::make(__('messages.user.full_name'), 'first_name')
                ->sortable()
                ->searchable()
                ->view('users.table-components.full-name'),
            Column::make(__('messages.user.email'), 'email')
                ->searchable()->hideIf(1),
            Column::make(__('messages.client.role'), "id")
                ->sortable()
                ->searchable()
                ->view('users.table-components.my-role'),
            Column::make(__('messages.user.email_verified'), 'email_verified_at')
                ->view('users.table-components.email-verified'),
            Column::make(__('messages.common.status'), "status")
                ->searchable()
                ->view('users.table-components.my-status'),
            Column::make(__('messages.common.action'), "id")
                ->format(function($value, $row, Column $column) {
                    return view('livewire.action-button')
                        ->withValue([
                            'edit-route' => route('users.edit', $row->id),
                            'data-id' => $row->id
                        ]);
                })
        ];
    }

    public function builder(): Builder
    {
        return User::role('admin')->with(['roles', 'media'])->select('users.*');
    }
}

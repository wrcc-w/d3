@aware(['component'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div class="md:flex md:justify-between mb-4 px-4 md:p-0">
        <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2">
            @if ($component->reorderIsEnabled())
                <button
                    wire:click="{{ $component->currentlyReorderingIsEnabled() ? 'disableReordering' : 'enableReordering' }}"
                    type="button"
                    class="inline-flex justify-center items-center w-full md:w-auto px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600"
                >
                    @if ($component->currentlyReorderingIsEnabled())
                        @lang('Done Reordering')
                    @else
                        @lang('Reorder')
                    @endif
                </button>
            @endif

            @if ($component->searchIsEnabled() && $component->searchVisibilityIsEnabled())
                <div class="flex rounded-md shadow-sm">
                    <input
                        wire:model{{ $component->getSearchOptions() }}="{{ $component->getTableName() }}.search"
                        placeholder="{{ __('Search') }}"
                        type="text"
                        class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600 @if ($component->hasSearch()) rounded-none rounded-l-md focus:ring-0 focus:border-gray-300 @else focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md @endif"
                    />

                    @if ($component->hasSearch())
                        <span wire:click.prevent="clearSearch" class="inline-flex items-center px-3 text-gray-500 bg-gray-50 rounded-r-md border border-l-0 border-gray-300 cursor-pointer sm:text-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    @endif
                </div>
            @endif

            @if ($component->filtersAreEnabled() && $component->filtersVisibilityIsEnabled() && $component->hasFilters())
                <div
                    @if ($component->isFilterLayoutPopover())
                    x-data="{ open: false }"
                    x-on:keydown.escape.stop="open = false"
                    x-on:mousedown.away="open = false"
                    @endif

                    class="relative block md:inline-block text-left"
                >
                    <div>
                        <button
                            type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600"

                            @if ($component->isFilterLayoutPopover())
                            x-on:click="open = !open"
                            aria-haspopup="true"
                            x-bind:aria-expanded="open"
                            aria-expanded="true"
                            @endif

                            @if ($component->isFilterLayoutSlideDown())
                            x-on:click="filtersOpen = !filtersOpen"
                            @endif
                        >
                            @lang('Filters')

                            @if ($component->hasAppliedFiltersWithValues())
                                <span class="ml-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-100 text-indigo-800 capitalize dark:bg-indigo-200 dark:text-indigo-900">
                                    {{ $component->getAppliedFiltersWithValuesCount()}}
                                </span>
                            @endif

                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                        </button>
                    </div>

                    @if ($component->isFilterLayoutPopover())
                        <div
                            wire:key='{{ $component->getTableName() }}-filters-popover-menu'
                            x-cloak
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-left absolute left-0 mt-2 w-full md:w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-50 dark:bg-gray-700 dark:text-white dark:divide-gray-600"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="filters-menu"
                        >
                            @foreach($component->getFilters() as $filter)
                                <div class="py-1" role="none">
                                    <div class="block px-4 py-2 text-sm text-gray-700 space-y-1" role="menuitem">
                                        <label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}"
                                               class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                                            {{ $filter->getName() }}
                                        </label>

                                        {{ $filter->render($component) }}
                                    </div>
                                </div>
                            @endforeach

                            @if ($component->hasAppliedFiltersWithValues())
                                <div class="block px-4 py-3 text-sm text-gray-700 dark:text-white" role="menuitem">
                                    <button
                                        wire:click.prevent="setFilterDefaults"
                                        x-on:click="open = false"
                                        type="button"
                                        class="w-full inline-flex items-center justify-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:border-gray-500"
                                    >
                                        @lang('Clear')
                                    </button>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="md:flex md:items-center space-y-4 md:space-y-0 md:space-x-2">
            @if ($component->showBulkActionsDropdown())
                <div class="w-full md:w-auto mb-4 md:mb-0">
                    <div
                        x-data="{ open: false }"
                        @keydown.window.escape="open = false"
                        x-on:click.away="open = false"
                        class="relative inline-block text-left z-10 w-full md:w-auto"
                        wire:key="bulk-actions-button-{{ $component->getTableName() }}"
                    >
                        <div>
                            <span class="rounded-md shadow-sm">
                                <button
                                    x-on:click="open = !open"
                                    type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600"
                                    aria-haspopup="true"
                                    x-bind:aria-expanded="open"
                                    aria-expanded="true"
                                >
                                    @lang('Bulk Actions')

                                    <svg class="-mr-1 ml-2 h-5 w-5" x-description="Heroicon name: chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                        </div>

                        <div
                            x-cloak
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-full md:w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-50"
                        >
                            <div class="rounded-md bg-white shadow-xs dark:bg-gray-700 dark:text-white">
                                <div class="py-1" role="menu" aria-orientation="vertical">
                                    @foreach($component->getBulkActions() as $action => $title)
                                        <button
                                            wire:click="{{ $action }}"
                                            wire:key="bulk-action-{{ $action }}-{{ $component->getTableName() }}"
                                            type="button"
                                            class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 flex items-center space-x-2 dark:text-white dark:hover:bg-gray-600"
                                            role="menuitem"
                                        >
                                            <span>{{ $title }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($component->columnSelectIsEnabled())
                <div class="mb-4 w-full md:w-auto md:mb-0 md:ml-2">
                    <div
                        x-data="{ open: false }"
                        @keydown.window.escape="open = false"
                        x-on:click.away="open = false"
                        class="inline-block relative w-full text-left md:w-auto"
                        wire:key="column-select-button-{{ $component->getTableName() }}"
                    >
                        <div>
                            <span class="rounded-md shadow-sm">
                                <button
                                    x-on:click="open = !open"
                                    type="button"
                                    class="inline-flex justify-center px-4 py-2 w-full text-sm font-medium text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600"
                                    aria-haspopup="true"
                                    x-bind:aria-expanded="open"
                                    aria-expanded="true"
                                >
                                    @lang('Columns')

                                    <svg class="-mr-1 ml-2 w-5 h-5" x-description="Heroicon name: chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                        </div>

                        <div
                            x-cloak
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-50 mt-2 w-full bg-white rounded-md divide-y divide-gray-100 ring-1 ring-black ring-opacity-5 shadow-lg origin-top-right md:w-48 focus:outline-none"
                        >
                            <div class="bg-white rounded-md shadow-xs dark:bg-gray-700 dark:text-white">
                                <div class="p-2" role="menu" aria-orientation="vertical" aria-labelledby="column-select-menu">
                                    @foreach($component->getColumns() as $column)
                                        @if ($column->isVisible() && $column->isSelectable())
                                            <div wire:key="columnSelect-{{ $loop->index }}-{{ $component->getTableName() }}">
                                                <label
                                                    wire:loading.attr="disabled"
                                                    wire:target="selectedColumns"
                                                    class="inline-flex items-center px-2 py-1 disabled:opacity-50 disabled:cursor-wait"
                                                >
                                                    <input
                                                        class="text-indigo-600 rounded border-gray-300 shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:bg-gray-600 disabled:opacity-50 disabled:cursor-wait"
                                                        wire:model="selectedColumns"
                                                        wire:target="selectedColumns"
                                                        wire:loading.attr="disabled"
                                                        type="checkbox"
                                                        value="{{ $column->getHash() }}"
                                                    />
                                                    <span class="ml-2">{{ $column->getTitle() }}</span>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($component->paginationIsEnabled() && $component->perPageVisibilityIsEnabled())
                <div>
                    <select
                        wire:model="perPage"
                        id="perPage"
                        class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    >
                        @foreach ($component->getPerPageAccepted() as $item)
                            <option value="{{ $item }}" wire:key="per-page-{{ $item }}-{{ $component->getTableName() }}">{{ $item === -1 ? __('All') : $item }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>

    @if ($component->filtersAreEnabled() && $component->filtersVisibilityIsEnabled() && $component->hasFilters() && $component->isFilterLayoutSlideDown())
        <div
            x-cloak
            x-show="filtersOpen"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0"
            x-transition:enter-end="transform opacity-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100"
            x-transition:leave-end="transform opacity-0"
        >
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 px-4 md:p-0 mb-6">
                @foreach($component->getFilters() as $filter)
                    <div class="space-y-1">
                        <label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}"
                               class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                            {{ $filter->getName() }}
                        </label>

                        {{ $filter->render($component) }}
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@elseif ($theme === 'bootstrap-4')
    <div class="d-md-flex justify-content-between mb-3">
        <div class="d-md-flex">
            @if ($component->reorderIsEnabled())
                <div class="mr-0 mr-md-2 mb-3 mb-md-0">
                    <button
                        wire:click="{{ $component->currentlyReorderingIsEnabled() ? 'disableReordering' : 'enableReordering' }}"
                        type="button"
                        class="btn btn-default d-block w-100 d-md-inline"
                    >
                        @if ($component->currentlyReorderingIsEnabled())
                            @lang('Done Reordering')
                        @else
                            @lang('Reorder')
                        @endif
                    </button>
                </div>
            @endif

            @if ($component->searchIsEnabled() && $component->searchVisibilityIsEnabled())
                <div class="mb-3 mb-md-0 input-group">
                    <input
                        wire:model{{ $component->getSearchOptions() }}="{{ $component->getTableName() }}.search"
                        placeholder="{{ __('Search') }}"
                        type="text"
                        class="form-control"
                    >

                    @if ($component->hasSearch())
                        <div class="input-group-append">
                            <button wire:click.prevent="clearSearch" class="btn btn-outline-secondary" type="button">
                                <svg style="width:.75em;height:.75em" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            @endif

            @if ($component->filtersAreEnabled() && $component->filtersVisibilityIsEnabled() && $component->hasFilters())
                <div class="ml-0 ml-md-2 mb-3 mb-md-0">
                    <div
                        @if ($component->isFilterLayoutPopover())
                        x-data="{ open: false }"
                        x-on:keydown.escape.stop="open = false"
                        x-on:mousedown.away="open = false"
                        @endif

                        class="btn-group d-block d-md-inline"
                    >
                        <div>
                            <button
                                type="button"
                                class="btn dropdown-toggle d-block w-100 d-md-inline"

                                @if ($component->isFilterLayoutPopover())
                                x-on:click="open = !open"
                                aria-haspopup="true"
                                x-bind:aria-expanded="open"
                                aria-expanded="true"
                                @endif

                                @if ($component->isFilterLayoutSlideDown())
                                x-on:click="filtersOpen = !filtersOpen"
                                @endif
                            >
                                @lang('Filters')

                                @if ($component->hasAppliedFiltersWithValues())
                                    <span class="badge badge-info">
                                        {{ $component->getAppliedFiltersWithValuesCount()}}
                                    </span>
                                @endif

                                <span class="caret"></span>
                            </button>
                        </div>

                        @if ($component->isFilterLayoutPopover())
                            <ul
                                wire:key='{{ $component->getTableName() }}-filters-popover-menu'
                                x-cloak
                                class="dropdown-menu w-100 mt-md-5"
                                x-bind:class="{'show' : open}"
                                role="menu"
                            >
                                @foreach($component->getFilters() as $filter)
                                    <div wire:key="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}" class="p-2">
                                        <label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}" class="mb-2">
                                            {{ $filter->getName() }}
                                        </label>

                                        {{ $filter->render($component) }}
                                    </div>
                                @endforeach

                                @if ($component->hasAppliedFiltersWithValues())
                                    <div class="dropdown-divider"></div>

                                    <button
                                        wire:click.prevent="setFilterDefaults"
                                        x-on:click="open = false"
                                        class="dropdown-item btn text-center"
                                    >
                                        @lang('Clear')
                                    </button>
                                @endif
                            </ul>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <div class="d-md-flex">
            @if ($component->showBulkActionsDropdown())
                <div class="mb-3 mb-md-0">
                    <div class="dropdown d-block d-md-inline">
                        <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button" id="{{ $component->getTableName() }}-bulkActionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('Bulk Actions')
                        </button>

                        <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="{{ $component->getTableName() }}-bulkActionsDropdown">
                            @foreach($component->getBulkActions() as $action => $title)
                                <a
                                    href="#"
                                    wire:click="{{ $action }}"
                                    wire:key="bulk-action-{{ $action }}-{{ $component->getTableName() }}"
                                    class="dropdown-item"
                                >
                                    {{ $title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if ($component->columnSelectIsEnabled())
                <div class="mb-3 mb-md-0 pl-0 pl-md-2">
                    <div
                        x-data="{ open: false }"
                        x-on:keydown.escape.stop="open = false"
                        x-on:mousedown.away="open = false"
                        class="dropdown d-block d-md-inline"
                        wire:key="column-select-button-{{ $component->getTableName() }}"
                    >
                        <button
                            x-on:click="open = !open"
                            class="btn dropdown-toggle d-block w-100 d-md-inline"
                            type="button"
                            id="columnSelect-{{ $component->getTableName() }}"
                            aria-haspopup="true"
                            x-bind:aria-expanded="open"
                        >
                            @lang('Columns')
                        </button>

                        <div
                            class="dropdown-menu dropdown-menu-right w-100 mt-0 mt-md-3"
                            x-bind:class="{'show' : open}"
                            aria-labelledby="columnSelect-{{ $component->getTableName() }}"
                        >
                            @foreach($component->getColumns() as $column)
                                @if ($column->isVisible() && $column->isSelectable())
                                    <div wire:key="columnSelect-{{ $loop->index }}-{{ $component->getTableName() }}">
                                        <label
                                            wire:loading.attr="disabled"
                                            wire:target="selectedColumns"
                                            class="px-2 {{ $loop->last ? 'mb-0' : 'mb-1' }}"
                                        >
                                            <input
                                                wire:model="selectedColumns"
                                                wire:target="selectedColumns"
                                                wire:loading.attr="disabled"
                                                type="checkbox"
                                                value="{{ $column->getHash() }}"
                                            />
                                            <span class="ml-2">{{ $column->getTitle() }}</span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if ($component->paginationIsEnabled() && $component->perPageVisibilityIsEnabled())
                <div class="ml-0 ml-md-2">
                    <select
                        wire:model="perPage"
                        id="perPage"
                        class="form-control"
                    >
                        @foreach ($component->getPerPageAccepted() as $item)
                            <option value="{{ $item }}" wire:key="per-page-{{ $item }}-{{ $component->getTableName() }}">{{ $item === -1 ? __('All') : $item }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>

    @if ($component->filtersAreEnabled() && $component->filtersVisibilityIsEnabled() && $component->hasFilters() && $component->isFilterLayoutSlideDown())
        <div
            x-cloak
            x-show="filtersOpen"
        >
            <div class="container">
                <div class="row">
                    @foreach($component->getFilters() as $filter)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}"
                                   class="d-block">
                                {{ $filter->getName() }}
                            </label>

                            {{ $filter->render($component) }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@elseif ($theme === 'bootstrap-5')
    <div class="d-md-flex justify-content-between mb-3 livewire-search-box">
        <div class="d-md-flex">
            @if ($component->reorderIsEnabled())
                <div class="me-0 me-md-2 mb-3 mb-md-0">
                    <button
                        wire:click="{{ $component->currentlyReorderingIsEnabled() ? 'disableReordering' : 'enableReordering' }}"
                        type="button"
                        class="btn btn-default d-block w-100 d-md-inline"
                    >
                        @if ($component->currentlyReorderingIsEnabled())
                            @lang('Done Reordering')
                        @else
                            @lang('Reorder')
                        @endif
                    </button>
                </div>
            @endif

            @if ($component->searchIsEnabled() && $component->searchVisibilityIsEnabled())
                <div class="mb-3 mb-md-0 input-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.75px" height="22.75px" viewBox="0 0 24 24"
                         version="1.1"
                         class="search-box-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="22.75" height="22.75"></rect>
                            <path
                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                fill="#a1a5b7" fill-rule="nonzero" opacity="0.3"></path>
                            <path
                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                fill="#a1a5b7" fill-rule="nonzero"></path>
                        </g>
                    </svg>
                    <input
                        wire:model{{ $component->getSearchOptions() }}="{{ $component->getTableName() }}.search"
                        placeholder="{{ __('Search') }}"
                        type="text"
                        class="form-control search-box"
                    >

                    @if ($component->hasSearch())
                        <button wire:click.prevent="clearSearch" class="btn btn-outline-secondary" type="button">
                            <svg style="width:.75em;height:.75em" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    @endif
                </div>
            @endif


        </div>

        <div class="d-md-flex">
            @if ($component->filtersAreEnabled() && $component->filtersVisibilityIsEnabled() && $component->hasFilters())
                <div class="{{ $component->searchIsEnabled() ? 'ms-0 ms-md-2' : '' }} mb-3 mb-md-0 me-4">
                    <div
                        @if ($component->isFilterLayoutPopover())
                        x-data="{ open: false }"
                        x-on:keydown.escape.stop="open = false"
                        x-on:mousedown.away="open = false"
                        @endif

                        class="btn-group d-block d-md-inline"
                    >
                        <div>

                            <a href="#" class="btn btn-flex btn-light-primary fw-bolder"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                               data-kt-menu-flip="top-end"
                               @if ($component->isFilterLayoutPopover())
                               x-on:click="open = !open"
                               aria-haspopup="true"
                               x-bind:aria-expanded="open"
                               aria-expanded="true"
                               @endif

                               @if ($component->isFilterLayoutSlideDown())
                               x-on:click="filtersOpen = !filtersOpen"
                                @endif

{{--                                @if ($component->hasAppliedFiltersWithValues())--}}
{{--                                    <span class="badge bg-info">--}}
{{--                                            {{ $component->getAppliedFiltersWithValuesCount()}}--}}
{{--                                        </span>--}}
{{--                                @endif--}}
                                >
                                <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                                {{ __('messages.common.filter') }}
                            </a>
                        </div>

                        @if ($component->isFilterLayoutPopover())
                            <ul
                                wire:key='{{ $component->getTableName() }}-filters-popover-menu'
                                x-cloak
                                class="dropdown-menu w-100 p-0"
                                x-bind:class="{'show' : open}"
                                role="menu"
                            >
                                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px show"
                                     data-kt-menu="true">
                                    <div class="px-7 py-5">
                                        <div
                                            class="fs-5 text-dark fw-bolder">{{ __('messages.common.filter_options') }}</div>
                                    </div>
                                    <div class="separator border-gray-200"></div>
                                    <div class="px-7 py-5">
                                        @foreach($component->getFilters() as $filter)
                                            <div class="mb-10"
                                                 wire:key="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}">
                                                <label class="form-label fs-6 fw-bold"
                                                       for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}">
                                                    {{ $filter->getName() }}
                                                </label>
                                                {{ $filter->render($component) }}
                                            </div>
                                        @endforeach
                                        {{--                                        @if ($component->hasAppliedFiltersWithValues())--}}
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                    wire:click.prevent="setFilterDefaults"
                                                    x-on:click="open = false">{{ __('messages.common.reset') }}</button>
                                        </div>
                                        {{--                                        @endif--}}
                                    </div>
                                </div>
                            </ul>
                        @endif
                    </div>
                </div>
            @endif
            @if ($component->showBulkActionsDropdown())
                <div class="mb-3 mb-md-0">
                    <div class="dropdown d-block d-md-inline">
                        <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button" id="{{ $component->getTableName() }}-bulkActionsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('Bulk Actions')
                        </button>

                        <div class="dropdown-menu dropdown-menu-end w-100" aria-labelledby="{{ $component->getTableName() }}-bulkActionsDropdown">
                            @foreach($component->getBulkActions() as $action => $title)
                                <a
                                    href="#"
                                    wire:click.prevent="{{ $action }}"
                                    wire:key="bulk-action-{{ $action }}-{{ $component->getTableName() }}"
                                    class="dropdown-item"
                                >
                                    {{ $title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if ($component->columnSelectIsEnabled())
                <div class="mb-3 mb-md-0 md-0 ms-md-2">
                    <div
                        x-data="{ open: false }"
                        x-on:keydown.escape.stop="open = false"
                        x-on:mousedown.away="open = false"
                        class="dropdown d-block d-md-inline"
                        wire:key="column-select-button-{{ $component->getTableName() }}"
                    >
                        <button
                            x-on:click="open = !open"
                            class="btn dropdown-toggle d-block w-100 d-md-inline"
                            type="button"
                            id="columnSelect-{{ $component->getTableName() }}"
                            aria-haspopup="true"
                            x-bind:aria-expanded="open"
                        >
                            @lang('Columns')
                        </button>

                        <div
                            class="dropdown-menu dropdown-menu-end w-100"
                            x-bind:class="{'show' : open}"
                            aria-labelledby="columnSelect-{{ $component->getTableName() }}"
                        >
                            @foreach($component->getColumns() as $column)
                                @if ($column->isVisible() && $column->isSelectable())
                                    <div wire:key="columnSelect-{{ $loop->index }}-{{ $component->getTableName() }}">
                                        <label
                                            wire:loading.attr="disabled"
                                            wire:target="selectedColumns"
                                            class="px-2 {{ $loop->last ? 'mb-0' : 'mb-1' }}"
                                        >
                                            <input
                                                wire:model="selectedColumns"
                                                wire:target="selectedColumns"
                                                wire:loading.attr="disabled"
                                                type="checkbox"
                                                value="{{ $column->getHash() }}"
                                            />
                                            <span class="ml-2">{{ $column->getTitle() }}</span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{--            @if ($component->paginationIsEnabled() && $component->perPageVisibilityIsEnabled())--}}
            {{--                <div class="ms-0 ms-md-2 livewire-pagination">--}}
            {{--                    <select--}}
            {{--                        wire:model="perPage"--}}
            {{--                        id="perPage"--}}
            {{--                        class="form-control"--}}
            {{--                    >--}}
            {{--                        @foreach ($component->getPerPageAccepted() as $item)--}}
            {{--                            <option value="{{ $item }}"--}}
            {{--                                    wire:key="per-page-{{ $item }}-{{ $component->getTableName() }}">{{ $item === -1 ? __('All') : $item }}</option>--}}
            {{--                        @endforeach--}}
            {{--                    </select>--}}
            {{--                </div>--}}
            {{--                @endif--}}

            @if ($component->showButtonOnHeader)
                @include($component->buttonComponent)
            @endif
        </div>
    </div>

    @if ($component->filtersAreEnabled() && $component->filtersVisibilityIsEnabled() && $component->hasFilters() && $component->isFilterLayoutSlideDown())
        <div
            x-cloak
            x-show="filtersOpen"
        >
            <div class="container">
                <div class="row">
                    @foreach($component->getFilters() as $filter)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}"
                                   class="d-block">
                                {{ $filter->getName() }}
                            </label>

                            {{ $filter->render($component) }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endif

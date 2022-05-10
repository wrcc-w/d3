@aware(['component'])
@props(['rows'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'bootstrap-4')
    <div>
        @if ($component->paginationVisibilityIsEnabled())
            @if ($component->paginationIsEnabled() && $rows->lastPage() > 1)
                <div class="row mt-3">
                    <div class="col-12 col-md-6 overflow-auto">
                        {{ $rows->links('livewire-tables::specific.bootstrap-4.pagination') }}
                    </div>

                    <div class="col-12 col-md-6 text-center text-md-right text-muted">
                        <span>@lang('Showing')</span>
                        <strong>{{ $rows->count() ? $rows->firstItem() : 0 }}</strong>
                        <span>@lang('to')</span>
                        <strong>{{ $rows->count() ? $rows->lastItem() : 0 }}</strong>
                        <span>@lang('of')</span>
                        <strong>{{ $rows->total() }}</strong>
                        <span>@lang('results')</span>
                    </div>
                </div>
            @else
                <div class="row mt-3">
                    <div class="col-12 text-muted">
                        @lang('Showing')
                        <strong>{{ $rows->count() }}</strong>
                        @lang('results')
                    </div>
                </div>
            @endif
        @endif
    </div>
@elseif ($theme === 'bootstrap-5')
    <div>
        @if ($component->paginationVisibilityIsEnabled())
            @if ($component->paginationIsEnabled())
                <div class="row mt-3 flex-md-row-reverse flex-column-reverse mx-0">
                    <div class="col-12 col-md-6 overflow-auto">
                        {{ $rows->links('livewire-tables::specific.bootstrap-4.pagination') }}
                    </div>

                    <div
                        class="col-12 col-md-6 text-center text-md-end text-muted d-flex align-items-center justify-content-md-start justify-content-center mb-md-0 mb-4">
                        @if ($component->paginationIsEnabled() && $component->perPageVisibilityIsEnabled())
                            <div class="ms-0 ms-md-2 d-flex align-items-center">
                                <span class="me-2 text-md-dark">Show</span>
                                <select
                                    wire:model="perPage"
                                    id="perPage"
                                    class="form-select data-select-sorting"
                                >
                                    @foreach ($component->getPerPageAccepted() as $item)
                                        <option value="{{ $item }}"
                                                wire:key="per-page-{{ $item }}-{{ $component->getTableName() }}">{{ $item === -1 ? __('All') : $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="ms-3 text-md-dark">
                            <span>@lang('Showing')</span>
                            <strong>{{ $rows->count() ? $rows->firstItem() : 0 }}</strong>
                            <span>@lang('to')</span>
                            <strong>{{ $rows->count() ? $rows->lastItem() : 0 }}</strong>
                            <span>@lang('of')</span>
                            <strong>{{ $rows->total() }}</strong>
                            <span>@lang('results')</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="row mt-3">
                    <div class="col-12 text-muted">
                        @lang('Showing')
                        <strong>{{ $rows->count() }}</strong>
                        @lang('results')
                    </div>
                </div>
            @endif
        @endif
    </div>
@endif

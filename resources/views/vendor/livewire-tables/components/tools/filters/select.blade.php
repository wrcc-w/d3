@php
    $theme = $component->getTheme();
@endphp
@if($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
    <select
        wire:model.stop="{{ $component->getTableName() }}.filters.{{ $filter->getKey() }}"
        wire:key="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}"
        id="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}"
        class="form-control"
    >
        <option value="">All</option>
        @foreach($filter->getOptions() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
@endif

<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
    <a href="#">
        <div class="symbol-label">
            <img src="{{ $row->profile_image }}" alt=""
                 class="w-100 object-fit-cover">
        </div>
    </a>
</div>
<div class="d-inline-block align-top">
    <a href="{{ route('users.show', $row->id) }}"
       class="text-primary-800 mb-1 d-block">{{ $row->full_name }}</a>
    <span class="d-block">{{ $row->email }}</span>
</div>

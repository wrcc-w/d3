@if ($row->role_name === 'Admin')
    <span class="badge badge-light-success fs-7">{{ $row->role_name }}</span>
@elseif ($row->role_name === 'Client')
    <span class="badge badge-light-primary fs-7">{{ $row->role_name }}</span>
@endif

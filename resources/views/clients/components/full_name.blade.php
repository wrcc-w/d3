<div class="d-flex align-items-center">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{route('clients.show', $row->id)}}">
            <div class="">
                <img src="{{$row->user->profile_image}}" alt="" class="user-img" width="50px" height="50px">
            </div>
        </a>
    </div>
    <div class="d-flex flex-column">
        <a href="{{route('clients.show', $row->id)}}" class="mb-1">{{$row->user->full_name}}</a>
        <span>{{$row->user->email}}</span>
    </div>
</div>

<div class="d-flex align-items-center">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{route('products.show', $row->id)}}">
            <div class="">
                <img src="{{$row->product_image}}" alt="" class="user-img" width="50px" height="50px">
            </div>
        </a>
    </div>
    <div class="d-flex flex-column">
        <a href="{{route('products.show', $row->id)}}" class="mb-1">{{$row->name}}</a>
        <span>{{$row->code}}</span>
    </div>
</div>

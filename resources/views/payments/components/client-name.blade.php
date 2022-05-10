<div class="d-flex align-items-center">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{route('clients.show',$row->invoice->client->id)}}">
            <div>
                <img src="{{$row->invoice->client->user->profile_image}}" alt="" class="user-img">
            </div>
        </a>
    </div>
    <div class="d-flex flex-column">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('clients.show',$row->invoice->client->id)}}" class="mb-1">{{$row->invoice->client->user->full_name}}</a>
                <a href="{{route('invoices.show',$row->invoice->id)}}" class=" badge badge-light-info mb-1">{{$row->invoice->invoice_id}}</a>
            </div>
        </div>
        <span>{{$row->invoice->client->user->email}}</span>
    </div>
</div>

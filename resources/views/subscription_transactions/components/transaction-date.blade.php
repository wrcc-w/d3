<div class="badge badge-light">
    <div class="mb-2">{{\Carbon\Carbon::parse($row->created_at)->format('h:i A')}}</div>
    <div>{{\Carbon\Carbon::parse($row->created_at)->format('jS  M, Y')}}</div>
</div>

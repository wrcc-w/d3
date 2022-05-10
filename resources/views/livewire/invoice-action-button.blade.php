<div class="dropup" wire:key="{{ $row->id }}">
    <button class="btn btn-sm btn-light btn-active-light-primary" type="button" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo __('messages.common.action') ?>
        <span class="svg-icon svg-icon-5 m-0">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                 <path
                     d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                     fill="black"></path>
             </svg>
         </span>
    </button>
    @php
        $isEdit = ($row->status == 2 || $row->status == 3)  ? 1 : 0;
        $isPaid = ($row->status == 2 || $row->status == 0) ? 1 : 0;
        $isDraft = ($row->status == 0) ? 0 : 1;
@endphp
<ul  class="dropdown-menu width-5" aria-labelledby="dropdownMenuButton1" data-kt-menu-placement="bottom-end">
@if($isEdit != 1)
    <li>
    <a href="{{route('invoices.edit',$row->id)}}" class="dropdown-item text-hover-primary me-1 edit-btn" data-bs-toggle="tooltip" title="Edit">
            <?php echo __('messages.common.edit') ?>
    </a>
</li>
@endif
    <li>
           <a href="#" data-id="{{$row->id}}" class="delete-btn dropdown-item me-1 text-hover-primary" data-bs-toggle="tooltip" title="Delete">
                     <?php echo __('messages.common.delete') ?>
    </a>
  </li>
  @if($isPaid != 1)
    <li>
         <a href="#" data-id="{{$row->id}}" class="reminder-btn dropdown-item me-1 text-hover-primary" data-bs-toggle="tooltip" title="Payment Reminder Mail">
                      <?php echo __('messages.common.reminder') ?>
         </a>
    </li>
@endif
    @if($isDraft)
    <li>
          <a href="javascript:void(0)" data-url="{{route('invoice-show-url',$row->invoice_id)}}" class="dropdown-item text-hover-primary me-1 edit-btn  invoice-url" data-bs-toggle="tooltip" title="Copy Invoice URL" onclick="copyToClipboard($(this).data('url'))">
            Invoice URL
            </a>
        </li>
@endif
    </ul>
   </div>


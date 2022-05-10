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
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{route('clients.invoices.pdf', $row->id)}}"
               target="_blank"><?php echo __('messages.invoice.download') ?></a></li>
    @if($row->status_label != 'Paid')
    <li><a class="dropdown-item payment" href="#" data-id="{{$row->id}}"><?php echo __('messages.invoice.make_payment') ?></a></li>
    @endif
    </ul>
  </div>

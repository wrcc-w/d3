<script id="invoiceActionTemplate" type="text/x-jsrender">
     <div class="dropup">
  <button class="btn btn-sm btn-light btn-active-light-primary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?php echo __('messages.common.action') ?>
       <span class="svg-icon svg-icon-5 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                </svg>
            </span>
  </button>

  <ul  class="dropdown-menu width-5" aria-labelledby="dropdownMenuButton1" data-kt-menu-placement="bottom-end">
      {{if isEdit != 1}}
        <li>
        <a href="{{:editUrl}}" class="dropdown-item text-hover-primary me-1 edit-btn" data-bs-toggle="tooltip" title="Edit">
            <?php echo __('messages.common.edit') ?>
            </a>
        </li>
    {{/if}}
  <li>
         <a href="#" data-id="{{:id}}" class="delete-btn dropdown-item me-1 text-hover-primary" data-bs-toggle="tooltip" title="Delete">
                     <?php echo __('messages.common.delete') ?>
    </a>
  </li>
  {{if isPaid != 1}}
  <li>
       <a href="#" data-id="{{:id}}" class="reminder-btn dropdown-item me-1 text-hover-primary" data-bs-toggle="tooltip" title="Payment Reminder Mail">
                      <?php echo __('messages.common.reminder') ?>
    </a>    
  </li>
  {{/if}}
  {{if isDraft}}
  <li>
        <a href="javascript:void(0)" data-url="{{:showUrl}}" class="dropdown-item text-hover-primary me-1 edit-btn  invoice-url" data-bs-toggle="tooltip" title="Copy Invoice URL" onclick="copyToClipboard($(this).data('url'))">
            Invoice URL
            </a>
        </li>
    {{/if}}     
 </ul>
</div>


</script>

<script id="invoiceItemTemplate" type="text/x-jsrender">
<tr class="border-bottom border-bottom-dashed tax-tr">
    <td class="text-center item-number align-center">1</td>
    <td class="table__item-desc w-25">
        <select class="form-select productId product form-select-solid fw-bold" name="product_id[]" 'data-control' => 'select2' required>
            <option selected="selected" value="">Select Product or Enter free text</option>
            {{for products}}
                <option value="{{:key}}">{{:value}}</option>
            {{/for}}
        </select>
    </td>
    <td class="table__qty">
        <input class="form-control qty form-control-solid" required="" name="quantity[]" type="number" min="1">
    </td>
    <td>
        <input class="form-control price-input price form-control-solid" required="" name="price[]" type="number" oninput="validity.valid||(value=value.replace(/[e\+\-]/gi,''))" min='0' step='.01' onKeyPress="if(this.value.length==8) return false;">
    </td>
    <td class="w-100">
        <select data-link="defaultTax" class="form-select taxId tax form-select-solid fw-bold" name="tax[]" placeholder="Select Tax" multiple="multiple">
            {{for taxes}}
               <option value="{{:value}}" data-id="{{:id}}" {{:is_default ? 'selected' : '' }}>{{:name}}</option>
            {{/for}}
        </select>
    </td>
    <td class="tbAmount text-right item-total pt-8 text-nowrap">

    </td>
    <td class="text-end">
        <button type="button" title="Delete" class="btn btn-sm btn-icon btn-active-color-danger delete-invoice-item">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                    </svg>
                </span>
        </button>
    </td>
</tr>



</script>

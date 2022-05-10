<div class="me-4">
    <a href="{{ route('admin.invoicesExcel') }}" class="btn btn-light-success"
       title="Export Excel File"><i
                class="fas fa-file-excel"></i>{{__('messages.invoice.excel_export')}}</a>
</div>
<a href="{{ route('invoices.create') }}"
   class="btn btn-primary">{{__('messages.invoice.new_invoice')}}</a>

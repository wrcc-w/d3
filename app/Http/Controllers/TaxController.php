<?php

namespace App\Http\Controllers;

use App\DataTables\TaxDataTable;
use App\Http\Requests\CreateTaxRequest;
use App\Http\Requests\UpdateTaxRequest;
use App\Models\InvoiceItemTax;
use App\Models\Tax;
use App\Repositories\TaxRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaxController extends AppBaseController
{
    /** @var  TaxRepository */
    public $taxRepository;

    /**
     * @param  TaxRepository  $taxRepo
     */
    public function __construct(TaxRepository $taxRepo)
    {
        $this->taxRepository = $taxRepo;
    }

    /**
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('taxes.index');
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    public function store(CreateTaxRequest $request)
    {
        $input = $request->all();
        if ($input['is_default'] == '1') {
            Tax::where('is_default', '=', 1)->update(['is_default' => 0]);
            $tax = $this->taxRepository->create($input);
        } else {
            $tax = $this->taxRepository->create($input);
        }

        return $this->sendResponse($tax, 'Tax saved successfully.');
    }

    /**
     * @param  Tax  $tax
     *
     * @return mixed
     */
    public function edit(Tax $tax)
    {
        return $this->sendResponse($tax, 'Tax retrieved successfully.');
    }

    /**
     * @param  UpdateTaxRequest  $request
     * @param $taxId
     *
     * @return mixed
     */
    public function update(UpdateTaxRequest $request, $taxId)
    {
        $input = $request->all();
        if ($input['is_default'] == '1') {
            Tax::where('is_default', '=', 1)->update(['is_default' => 0]);
            $this->taxRepository->update($input, $taxId);
        } else {
            $this->taxRepository->update($input, $taxId);
        }

        return $this->sendSuccess('Tax updated successfully.');
    }

    /**
     * @param  Tax  $tax
     *
     * @return mixed
     */
    public function destroy(Tax $tax)
    {
        $invoiceModels = [
            InvoiceItemTax::class,
        ];
        $result = canDelete($invoiceModels, 'tax_id', $tax->id);
        if ($result) {
            return $this->sendError('Tax can\'t be deleted.');
        }
        $tax->delete();

        return $this->sendSuccess('Tax deleted successfully.');
    }

    /**
     * @param  Tax  $tax
     *
     * @return JsonResponse
     */
    public function defaultStatus(Tax $tax)
    {
        $status = ! $tax->is_default;
        if ($status == '1') {
            Tax::where('is_default', '=', 1)->update(['is_default' => 0]);
        }
        $tax->update(['is_default' => $status]);

        return $this->sendSuccess('Status updated successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\CurrencyDataTable;
use App\Http\Requests\CreateCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Models\Currency;
use App\Repositories\CurrencyRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CurrencyController extends AppBaseController
{
    /** @var  CurrencyRepository */
    public $currencyRepository;

    /**
     * @param  CurrencyRepository  $currencyRepo
     */
    public function __construct(CurrencyRepository $currencyRepo)
    {
        $this->currencyRepository = $currencyRepo;
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
        if ($request->ajax()) {
            return Datatables::of((new CurrencyDataTable())->get())->make(true);
        }

        return view('currencies.index');
    }

    /**
     * @param  CreateCurrencyRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateCurrencyRequest $request)
    {
        $input = $request->all();
        $currency = $this->currencyRepository->create($input);

        return $this->sendResponse($currency, 'Currency saved successfully.');
    }

    /**
     * @param  Currency  $currency
     *
     * @return JsonResponse
     */
    public function edit(Currency $currency)
    {
        return $this->sendResponse($currency, 'Currency retrieved successfully.');
    }

    /**
     * @param  UpdateCurrencyRequest  $request
     * @param $currencyId
     *
     * @return JsonResponse
     */
    public function update(UpdateCurrencyRequest $request, $currencyId)
    {
        $input = $request->all();
        $this->currencyRepository->update($input, $currencyId);

        return $this->sendSuccess('Currency updated successfully.');
    }

    /**
     * @param  Currency  $currency
     *
     * @return JsonResponse
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return $this->sendSuccess('Currency deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\ClientDataTable;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Country;
use App\Repositories\ClientRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ClientController extends AppBaseController
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @param ClientRepository $clientRepo
     */
    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * @param Request $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('clients.index');
    }

    /**
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');

        return view('clients.create', compact('countries'));
    }

    /**
     * @param CreateClientRequest $request
     *
     * @return RedirectResponse
     */
    public function store(CreateClientRequest $request): RedirectResponse
    {
        $input = $request->all();
        $this->clientRepository->store($input);
        Flash::success('Client created successfully.');

        return redirect()->route('clients.index');
    }

    /**
     * @param $clientId
     *
     * @return Application|Factory|View
     */
    public function show($clientId)
    {
        $client = Client::whereId($clientId)->firstOrFail();
        $client->load('user.media', 'invoices.payments');

        return view('clients.show', compact('client'));
    }

    /**
     * @param $clientId
     *
     * @return Application|Factory|View
     */
    public function edit($clientId)
    {
        $client = Client::whereId($clientId)->firstOrFail();
        $countries = Country::pluck('name', 'id');
        $client->load('user.media');

        return view('clients.edit', compact('client', 'countries'));
    }

    /**
     * @param $clientId
     * @param  UpdateClientRequest  $request
     *
     * @return RedirectResponse
     */
    public function update($clientId, UpdateClientRequest $request): RedirectResponse
    {
        $client = Client::whereId($clientId)->firstOrFail();
        $input = $request->all();
        $this->clientRepository->update($input, $client);
        Flash::success('Client updated successfully.');

        return redirect()->route('clients.index');
    }

    /**
     * @param $clientId
     *
     * @return JsonResponse
     */
    public function destroy($clientId)
    {
        $client = Client::whereId($clientId)->firstOrFail();
        $client->user()->delete();
        $client->delete();

        return $this->sendSuccess('Client Deleted successfully.');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getStates(Request $request)
    {
        $countryId = $request->get('countryId');
        $states = getStates($countryId);

        return $this->sendResponse($states, 'States retrieved successfully');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getCities(Request $request)
    {
        $stateId = $request->get('stateId');
        $cities = getCities($stateId);

        return $this->sendResponse($cities, 'Cities retrieved successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Repositories\PaymentGatewayRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class PaymentGatewayController extends Controller
{
    private $paymentGatewayRepository;

    public function __construct(PaymentGatewayRepository $paymentGatewayRepo)
    {
        $this->paymentGatewayRepository = $paymentGatewayRepo;
    }

    public function show(Request $request)
    {
        $paymentGateway = $this->paymentGatewayRepository->getSyncList();
        $sectionName = ($request->section === null) ? 'payment-gateway' : $request->section;

        return view("settings.$sectionName", compact('sectionName', 'paymentGateway'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        try {
            $this->paymentGatewayRepository->store($input);
            Flash::success('Setting updated successfully.');
        } catch (\Exception $exception) {
            Flash::error($exception->getMessage());
        }

        return redirect(route('payment-gateway.show'));
    }
}

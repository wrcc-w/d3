<?php

namespace App\Repositories;


use App\Models\AdminPayment;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class AdminPaymentRepository
 */
class AdminPaymentRepository extends BaseRepository
{
    /**
     *
     * @return string
     */
    public function model(): string
    {
        return AdminPayment::class;
    }

    /**
     * @param $input
     *
     * @return bool
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            $invoice = Invoice::with('payments')->whereId($input['invoice_id'])->firstOrFail();
            $totalPaidAmount = $invoice->payments->sum('amount') + $input['amount'];
            if ($totalPaidAmount <= $invoice->final_amount) {
                if ($invoice->final_amount == $totalPaidAmount) {
                    $invoice->update([
                        'status' => Invoice::PAID,
                    ]);
                } elseif ($invoice->final_amount > $totalPaidAmount) {
                    $invoice->update([
                        'status' => Invoice::Partially,
                    ]);
                }
            } else {
                throw new UnprocessableEntityHttpException('Amount should be less than payable amount.');
            }
            $user = Auth::user();
            $userData = Invoice::with('client.user')->where('id',$input['invoice_id'])->first();
            $input['payment_mode'] = Payment::CASH;
            $input['user_id'] = $userData->client->user_id;
            $input['payment_date'] = \Carbon\Carbon::createFromFormat(currentDateFormat(),
                $input['payment_date'])->format('Y-m-d');
            $payment = Payment::create($input);
            $input['payment_id'] = $payment->id;
            $input['tenant_id'] = $user->tenant_id;

            AdminPayment::create($input);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     *
     * @return bool
     */
    public function getFieldsSearchable(): bool
    {
        return false;
    }

    /**
     * @param $payment
     *
     * @return bool
     */
    public function adminDeletePayment($payment)
    {
        try {
            DB::beginTransaction();
            Payment::whereId($payment->payment_id)->delete();
            $invoice = Invoice::with('payments')->whereId($payment->invoice_id)->firstOrFail();
            $totalPaidAmount = $invoice->payments->sum('amount');
            if ($totalPaidAmount == 0) {
                $invoice->update([
                    'status' => Invoice::UNPAID,
                ]);
            } elseif ($invoice->final_amount > $totalPaidAmount) {
                $invoice->update([
                    'status' => Invoice::Partially,
                ]);
            }
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     *
     * @return bool
     */
    public function updatePayment($input): bool
    {
        try {
            DB::beginTransaction();

            $oldPaymentValue = AdminPayment::whereId($input['paymentId'])->sum('amount');
            $invoice = Invoice::with('payments')->whereId($input['invoice'])->firstOrFail();

            $totalPaidAmount = $invoice->payments->sum('amount') + $input['amount'] - $oldPaymentValue;
            if ($totalPaidAmount <= $invoice->final_amount && (float)$input['amount'] <= $invoice->final_amount) {
                if ($invoice->final_amount == $totalPaidAmount) {
                    $invoice->update([
                        'status' => Invoice::PAID,
                    ]);
                } elseif ($invoice->final_amount > $totalPaidAmount) {
                    $invoice->update([
                        'status' => Invoice::Partially,
                    ]);
                }
            } else {
                throw new UnprocessableEntityHttpException('Amount should be less than payable amount.');
            }

            $input['payment_date'] = \Carbon\Carbon::createFromFormat(currentDateFormat(), $input['payment_date'])->format('Y-m-d');
            /** @var AdminPayment $adminPayment */
            $adminPayment = AdminPayment::whereId($input['paymentId'])->firstOrFail();
            $adminPayment->update([
                'amount'       => $input['amount'],
                'payment_date' => $input['payment_date'],
                'notes'        => $input['notes'],
            ]);

            /** @var Payment $payment */
           $payment = Payment::whereId($input['transactionId'])->firstOrFail();
           $payment->update([
                'payment_date' => $input['payment_date'],
                'amount' => $input['amount'],
            ]);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}

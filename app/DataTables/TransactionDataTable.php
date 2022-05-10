<?php

namespace App\DataTables;

use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class TransactionDataTable
 */
class TransactionDataTable
{
    /**
     * @param  array  $input
     *
     * @return Subscription
     */
    public function get($input = [])
    {
        /** @var Transaction $ery */
        $query = Transaction::with([
            'transactionSubscription.subscriptionPlan', 'user.media',
        ])->whereHas('transactionSubscription')->select('transactions.*');

        if (getLoggedInUser()->hasRole('admin')) {
            $query->where('user_id', '=', getLogInUserId());
        }

        $query->when(isset($input['payment_type']),
            function (Builder $q) use ($input) {
                $q->where('payment_mode', $input['payment_type']);
            });

        return $query;
    }
}

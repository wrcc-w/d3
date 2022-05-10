<?php

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactorTenantIdOnAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('invoices', 'user_id'))
        {
            Schema::table('invoices', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->renameColumn('user_id', 'client_id');
            });
        }

        try {
            DB::beginTransaction();
            $rolExists = Role::whereName(Role::ROLE_ADMIN)->exists();

            if ($rolExists) {
                /** @var User $adminUsers */
                $adminUsers = User::role(Role::ROLE_ADMIN)->get();

                foreach ($adminUsers as $adminUser) {

                    /** @var Client $adminClients */
                    $adminClients = Client::whereUserId($adminUser->id)->get();

                    foreach ($adminClients as $adminClient) {
                        $clientUser = User::whereTenantId($adminClient->tenant_id)->first();

                        if (!$clientUser) {
                            continue;
                        }

                        $clientInvoices = Invoice::whereTenantId($clientUser->tenant_id)->get();
                        foreach ($clientInvoices as $clientInvoice) {
                            $clientInvoice->update([
                                'tenant_id' => $adminUser->tenant_id,
                                'client_id' => $adminClient->id,
                            ]);
                        }

                        $clientTransactions = Transaction::whereTenantId($clientUser->tenant_id)->get();
                        foreach ($clientTransactions as $clientTransaction) {
                            $clientTransaction->update([
                                'tenant_id' => $adminUser->tenant_id,
                                'user_id' => $adminClient->id,
                            ]);
                        }

                        $adminPayments = Payment::whereTenantId($clientUser->tenant_id)->get();
                        foreach ($adminPayments as $adminPayment) {
                            $adminPayment->update([
                                'tenant_id' => $adminUser->tenant_id,
                                'user_id' => $clientUser->id,
                            ]);
                        }

                        $notifications = Notification::whereTenantId($clientUser->tenant_id)->get();
                        foreach ($notifications as $notification) {
                            $notification->update([
                                'tenant_id' => $adminUser->tenant_id,
                                'user_id' => $clientUser->id,
                            ]);
                        }

                        $clientUser->update([
                            'tenant_id' => $adminUser->tenant_id,
                        ]);
                        $adminClient->update([
                            'tenant_id' => $adminUser->tenant_id,
                            'user_id' => $clientUser->id
                        ]);
                    }
                }
            }
            DB::commit();
        }catch (Exception $exception){
            DB::rollBack();
            throw new \Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException($exception->getMessage());
        }

        if (Schema::hasColumn('invoices', 'client_id'))
        {
            Schema::table('invoices', function (Blueprint $table) {
                $table->foreign('client_id')
                    ->references('id')
                    ->on('clients')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

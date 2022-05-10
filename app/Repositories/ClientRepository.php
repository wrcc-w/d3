<?php

namespace App\Repositories;

use App\Mail\CreateNewClientMail;
use App\Models\Client;
use App\Models\MultiTenant;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version August 6, 2021, 10:17 am UTC
 */
class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'website',
        'address',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Client::class;
    }

    /**
     * @param $input
     *
     *
     * @return bool
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();
            $tenant = MultiTenant::create(['tenant_username' => $input['first_name']]);
            $input['client_password'] = $input['password'];
            $input['password'] = Hash::make($input['password']);
            $input['role'] = getClientRoleId();

            /** @var User $user */
            $user = User::create($input);
            $user->assignRole($input['role']);

            $input['user_id'] = $user->id;
            $client = Client::create($input);

            if (isset($input['profile']) && !empty($input['profile'])) {
                $user->addMedia($input['profile'])->toMediaCollection(User::PROFILE, config('app.media_disc'));
            }
            if ($input['avatar_remove'] == 1 && isset($input['avatar_remove']) && empty($input['profile'])) {
                $user->clearMediaCollection(User::PROFILE);
                $user->media()->delete();
            }
            if (getSettingValue('mail_notification')) {
                Mail::to($input['email'])->send(new CreateNewClientMail($input));
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param array $input
     * @param Client $client
     *
     * @return bool
     */
    public function update($input, $client): bool
    {
        try {
            DB::beginTransaction();
            $user = User::find($client->user_id);
            $user->update($input);
            $client->update($input);

            if (isset($input['profile']) && !empty($input['profile'])) {
                $user->clearMediaCollection(User::PROFILE);
                $user->media()->delete();
                $user->addMedia($input['profile'])->toMediaCollection(User::PROFILE, config('app.media_disc'));
            }
            if ($input['avatar_remove'] == 1 && isset($input['avatar_remove']) && empty($input['profile'])) {
                $user->clearMediaCollection(User::PROFILE);
                $user->media()->delete();
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}

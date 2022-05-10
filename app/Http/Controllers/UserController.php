<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateChangePasswordRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Datatables;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class UserController extends AppBaseController
{
    /**
     * @var UserRepository
     */
    public $userRepository;

    /**
     * UserController constructor.
     *
     * @param  UserRepository  $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the User.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = $this->userRepository->getRole();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  CreateUserRequest  $request
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $this->userRepository->store($input);

        Flash::success('User created successfully.');

        return redirect(route('users.index'));
    }

    /**
     * @param  User  $user
     *
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        $user->load(['roles', 'media']);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  User  $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $user->load(['roles', 'media']);
        $roles = $this->userRepository->getRole()->except([User::ADMIN]);

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->update($request->all(), $user->id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->sendSuccess('User deleted successfully.');
    }

    /**
     * @return Application|Factory|View
     */
    public function editProfile()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    /**
     * @param  UpdateUserProfileRequest  $request
     *
     * @return Application
     */
    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $this->userRepository->updateProfile($request->all());
        Flash::success('User profile updated successfully.');

        return redirect(route('profile.setting'));
    }

    /**
     * @param  UpdateChangePasswordRequest  $request
     *
     * @return JsonResponse
     */
    public function changePassword(UpdateChangePasswordRequest $request)
    {
        $input = $request->all();

        try {
            /** @var User $user */
            $user = Auth::user();
            if (!Hash::check($input['current_password'], $user->password)) {
                return $this->sendError('Current password is invalid.');
            }
            $input['password'] = Hash::make($input['new_password']);
            $user->update($input);

            return $this->sendSuccess('Password updated successfully.');
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  User  $user
     *
     * @return JsonResponse
     */
    public function changeUserStatus(User $user)
    {
        $status = ! $user->status;
        $user->update(['status' => $status]);

        return $this->sendSuccess('Status updated successfully.');
    }

    /**
     * @param  Request  $request
     *
     *
     * @return JsonResponse
     */
    public function updateLanguage(Request $request): JsonResponse
    {
        $language = $request->get('languageName');

        $user = getLogInUser();
        $user->update(['language' => $language]);

        return $this->sendSuccess('Language updated successfully.');
    }

    /**
     *
     * @return RedirectResponse
     */
    public function updateDarkMode()
    {
        $user = Auth::user();
        $darkEnabled = $user->dark_mode == true;
        $user->update([
            'dark_mode' => !$darkEnabled,
        ]);

        return redirect()->back();
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     */
    public function isVerified($id)
    {
        $user = User::findOrFail($id);
        $emailVerified = $user->email_verified_at == null ? Carbon::now() : null;
        $user->update(['email_verified_at' => $emailVerified]);

        return $this->sendSuccess('Email Verified successfully.');
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     */
    public function activeDeactiveStatus($id)
    {
        $user = User::findOrFail($id);
        $status = !$user->status;
        User::where('tenant_id', $user->tenant_id)->update(['status' => $status]);

        return $this->sendSuccess('Status updated successfully.');
    }
}

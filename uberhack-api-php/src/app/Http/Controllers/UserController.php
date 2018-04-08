<?php
namespace App\Http\Controllers;
use App\Http\Requests\User\RegistrationRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User as UserModel;
use App\Http\Resources\User as UserResource;
use Auth;
class UserController extends Controller
{
    /**
     * Register a new user
     *
     * @param \App\Http\Requests\User\RegistrationRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationRequest $request)
    {
        $user = new UserModel($request->all());
        $user->password = bcrypt($request->get('password'));
        $user->save();

        Auth::login($user);

        return UserResource::make($user)->response();
    }
    /**
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(UserModel $user)
    {
        return UserResource::make($user)->response();
    }

    /**
     * @param \App\Http\Requests\User\UpdateRequest $request
     * @param \App\Models\User                      $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, UserModel $user)
    {
        if (Auth::user()->can('update', $user)) {
            $user->fill($request->only([
                'name',
            ]));

            if ($request->has('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return UserResource::make($user)->response();
        } else {
            return response()->json('Unauthorized.', 401);
        }
    }

    /**
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(UserModel $user)
    {
        $authorized = Auth::user()->can('delete', $user);
        if ($authorized) {
            $success = $user->delete();
        } else {
            $success = false;
        }
        return response()->json(compact('success'), $authorized ? 200 : 401);
    }
}
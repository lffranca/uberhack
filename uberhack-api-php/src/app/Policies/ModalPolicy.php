<?php

namespace App\Policies;

use App\Models\Modal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can list modals.
     *
     * @param  \App\Models\User  $authUser
     * @return mixed
     */
    public function list(User $authUser)
    {
        return true;
    }

    /**
     * Determine whether the user can show a modal.
     *
     * @param  \App\Models\User $authUser
     * @param  \App\Models\Modal $modal
     *
     * @return mixed
     */
    public function show(User $authUser, Modal $modal)
    {
        return true;
    }
}

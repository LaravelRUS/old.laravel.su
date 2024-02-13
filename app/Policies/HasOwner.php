<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

trait HasOwner
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User  $user
     * @param Model $model
     *
     * @return mixed
     */
    public function owner(User $user, Model $model)
    {
        if (! $model->exists) {
            return Response::allow();
        }

        return $user->id === $model->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User  $user
     * @param Model $model
     *
     * @return bool
     */
    public function isOwner(User $user, Model $model): bool
    {
        if (! $model->exists) {
            return true;
        }

        return $user->id === $model->user_id;
    }
}

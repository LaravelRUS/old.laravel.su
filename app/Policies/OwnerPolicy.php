<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

trait OwnerPolicy
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
        return ($user->id === $model->user_id) || is_null($model->user_id)
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
        return is_null($model->user_id) || ($user->id === $model->user_id);
    }
}

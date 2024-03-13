<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

trait HasBasePolicy
{
    use HasOwner;

    public function before(User $user, string $ability): ?bool
    {
        if ($user->banned) {
            return false;
        }

        return null;
    }

    /**
     * для маршрутов без указания модели вида /model/create
     *
     * @param User $user
     *
     * @return Response|mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view/create/edit/delete a model
     *
     * @param User  $user
     * @param Model $model
     *
     * @return mixed
     */
    public function update(User $user, Model $model)
    {

        return $this->owner($user, $model);
    }

    /**
     * Determine whether the user can view/create/edit/delete a model
     *
     * @param User  $user
     * @param Model $model
     *
     * @return mixed
     */
    public function delete(User $user, Model $model)
    {

        return $this->owner($user, $model);
    }
}

<?php

namespace App\Policies;

use App\Models\Challenge;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChallengesRepositoriesPolicy
{
    use HasBasePolicy;

    /**
     * для маршрутов без указания модели вида /model/create
     *
     * @param User $user
     *
     * @return Response|mixed
     */
    public function create(User $user)
    {

        return (bool) Challenge::active();
    }
}

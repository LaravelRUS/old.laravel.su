<?php

namespace App\Policies;

use App\Models\Challenge;
use App\Models\ChallengeApplication;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChallengeApplicationPolicy
{
    use HasBasePolicy;

    /**
     * Для маршрутов без указания модели вида /model/create
     *
     * @param User $user
     *
     * @return Response|mixed
     */
    public function create(User $user)
    {
        $challenge = Challenge::active()->first();

        if ($challenge === null) {
            return false;
        }

        return ! ChallengeApplication::where('challenge_id', $challenge->id)
            ->where('user_id', $user->id)
            ->exists();
    }
}

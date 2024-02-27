<?php

namespace App\Http\Controllers;

use App\Casts\PackageTypeEnum;
use App\Casts\SortEnum;
use App\Models\Challenge;
use App\Models\ChallengesReporitories;
use App\Models\Package;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Support\Facades\Toast;

class ChallengesRepositoriesController extends Controller
{


    public function edit(Request $request, ChallengesReporitories $repo)
    {
        $this->authorize('update', $repo);

        return view('challenges.registration', [
            'repo' => $repo,
        ]);
    }

    /**
     * @param Request $request
     * @param ChallengesReporitories $repo
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function update(Request $request, ChallengesReporitories $repo)
    {
        $this->authorize('update', $repo);

        $challenge = Challenge::active();

        $request->validate([
            'url' => ['string', 'required', 'regex:/^[a-z0-9_\-]+\/[a-z0-9_\-]+$/i'],
            'count_participants'           => 'required|numeric',
        ]);

        $repo->fill($request->all())->fill([
            'url'        => $request->input('url'),
            'count_participants' => $request->input('count_participants'),
        ]);

        $repo->challenge()->associate($challenge);

        $request->user()->challengesReapositories()->save($repo);


        Toast::success('Ваша заявка принята.')
                ->disableAutoHide();


        return redirect()->route('challenges');
    }

}

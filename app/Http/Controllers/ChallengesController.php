<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeApplication;
use App\Rules\GitHubRepositoryExists;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Support\Facades\Toast;

class ChallengesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return view('challenges.index', [
            'challenge' => Challenge::latest()->first() ?? Challenge::make([
                'title'       => 'test',
                'description' => 'test',
                'start_date'  => now()->addYear(),
                'stop_date'   => now()->addYears(2),
            ]),
        ]);
    }

    /**
     * Показывает форму регистрации на вызов.
     */
    public function edit(ChallengeApplication $repo): View
    {
        $this->authorize('update', $repo);

        return view('challenges.registration', [
            'repo' => $repo,
        ]);
    }

    /**
     * Обрабатывает заявку на вызов.
     */
    public function update(Request $request, ChallengeApplication $repo): RedirectResponse
    {
        $this->authorize('update', $repo);

        $challenge = Challenge::active()->first();

        $request->validate([
            'github_repository' => [
                'string',
                'required',
                'regex:/^[a-z0-9_\-]+\/[a-z0-9_\-]+$/i',
                new GitHubRepositoryExists(),
                Rule::unique('challenge_applications')->where('challenge_id', $challenge->id)->where('user_id', $request->user()->id),
                Rule::unique('challenge_applications')->where('challenge_id', $challenge->id)->where('github_repository', $request->input('github_repository')),
            ],
        ]);

        $repo->fill($request->all())
            ->challenge()
            ->associate($challenge);

        $request->user()
            ->challengesReapositories()
            ->save($repo);

        Toast::success('Ваша заявка принята.')->disableAutoHide();

        return redirect()->route('challenges');
    }
}

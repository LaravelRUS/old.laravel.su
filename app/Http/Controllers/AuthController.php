<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(): RedirectResponse
    {
        return Socialite::driver('github')
            ->scopes(['read:user'])
            ->redirect();
    }

    /**
     * Handle the callback request after GitHub authentication.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(): RedirectResponse
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::updateOrCreate(['github_id' => $githubUser->getId()], [
            'github_name' => $githubUser->getName() ?? $githubUser->getNickname(),
            'email'       => $githubUser->getEmail(),
            'avatar'      => $githubUser->getAvatar(),
            'nickname'    => $githubUser->getNickname() ?? $githubUser->getName(),
            'github_bio'  => $githubUser->getRaw()['bio'],
        ]);

        if (empty($user->name)) {
            $user->fill([
                'name' => $user->github_name ?? $user->nickname,
            ])->save();
        }

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->flush();

        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Casts\PackageTypeEnum;
use App\Casts\SortEnum;
use App\Models\Challenge;
use App\Models\Package;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Support\Facades\Toast;

class ChallengesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|null
     */
    public function index(Request $request)
    {

        return view('challenges.index', [
            'challenge' => Challenge::latest()
                ->first()
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\IdeaKey;
use App\Models\IdeaRequest;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;

class IdeaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|null
     */
    public function index()
    {
        return view('idea.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:2',
            'last_name'  => 'required|string|min:2',
            'city'       => 'required|string|min:3',
            'email'      => 'required|email',
            'message'    => 'nullable|string',
            'accepted'   => 'accepted',
        ]);

        $ideaRequest = new IdeaRequest();

        $ideaRequest->fill($request->all())->forceFill([
            'user_id' => $request->user()->id,
        ])->save();

        Toast::success('Ваш запрос принят и будет проверен модератором. При одобрении вы получите уведомление.')
            ->disableAutoHide();

        return redirect()->route('home');
    }

    /**
     * @param \App\Models\IdeaKey $key
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function key(IdeaKey $key)
    {
        return view('idea.key', [
            'key' => $key,
        ]);
    }
}

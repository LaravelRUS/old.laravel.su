<?php

namespace App\Http\Controllers;

use App\Models\IdeaKey;
use App\Models\IdeaRequest;
use Illuminate\Http\Request;

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
        ]);

        $ideaRequest = new IdeaRequest();
        $ideaRequest->fill($request->all())->forceFill([
            'user_id'    => $request->user()->id,
        ])->save();

        return redirect()->route('idea.index')
            ->with('success', 'Your request has been sent');
    }
    public function key(IdeaKey $key, Request $request){
        return view('idea.key', ['key' => $key ]);
    }
}

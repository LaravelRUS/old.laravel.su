<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Tonysm\TurboLaravel\Http\MultiplePendingTurboStreamResponse;
use Tonysm\TurboLaravel\Http\PendingTurboStreamResponse;

class MeetController extends Controller
{
    public function index()
    {
        $most = Meet::approved()
            ->whereDate('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->first();

        $actual = Meet::approved()
            ->whereDate('start_date', '>=', now())
            ->where('id', '!=', $most?->id)
            ->orderBy('start_date', 'asc')
            ->get();

        $past = Meet::approved()
            ->whereDate('start_date', '<', now())
            ->orderBy('start_date', 'desc')
            ->simplePaginate(5);

        return view('meet.index', [
            'most'   => $most,
            'actual' => $actual,
            'past'   => $past,
        ]);
    }

    public function edit(Request $request, Meet $meet)
    {
        $this->authorize('isOwner', $meet);

        return view('meet.edit', [
            'meet' => $meet,
        ]);
    }

    /**
     * @param Request $request
     * @param Meet    $meet
     *
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Meet $meet)
    {
        $this->authorize('isOwner', $meet);
        $dateMax = now()->toDateString();

        $request->validate([
            'meet'             => 'required|array',
            'meet.name'        => 'required|string',
            'meet.description' => 'required|string',
            'meet.start_date'  => 'date|after:' . $dateMax,
            'meet.location'     => 'required|string',
            'meet.online'      => 'sometimes|boolean',
            'meet.link'        => 'required|url',
        ]);

        $meet->fill(array_merge($request->get('meet'), [
            'online' => $request->boolean('meet.online'),
            'user_id' => $request->user()->id

        ]))
            ->save();

        return redirect()->route('meets');
    }

    /**
     * @param Meet $meet
     *
     * @return MultiplePendingTurboStreamResponse|PendingTurboStreamResponse
     * @throws AuthorizationException
     */
    public function delete( Meet $meet)
    {
        $this->authorize('isOwner', $meet);

        $meet->delete();
        //сюда поставить уведомление

        return turbo_stream()->remove($meet);
    }
}

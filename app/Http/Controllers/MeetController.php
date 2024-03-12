<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;

class MeetController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
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
            ->simplePaginate(6);

        return view('meet.index', [
            'most'   => $most,
            'actual' => $actual,
            'past'   => $past,
        ]);
    }

    public function edit(Request $request, Meet $meet)
    {
        $this->authorize('update', $meet);

        return view('meet.edit', [
            'meet' => $meet,
        ]);
    }

    /**
     * @param Request $request
     * @param Meet    $meet
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function update(Request $request, Meet $meet)
    {
        $this->authorize('update', $meet);
        $dateMax = now()->toDateString();

        $request->validate([
            'meet'             => 'required|array',
            'meet.name'        => 'required|string',
            'meet.description' => 'required|string',
            'meet.start_date'  => 'date|after:'.$dateMax,
            'meet.location'    => 'required_without:meet.online|string|nullable',
            'meet.online'      => 'sometimes|boolean',
            'meet.link'        => 'required|url',
        ],
            [],
            [
                'meet.location' => 'Адрес',
                'meet.link'     => 'ссылка',
                'meet.online'   => 'Онлайн',
            ]);

        $meet->fill(array_merge($request->get('meet'), [
            'online'  => $request->boolean('meet.online'),
            'user_id' => $request->user()->id,

        ]))
            ->save();

        if ($meet->approved) {
            Toast::success('Изменения успешно сохранены.')->disableAutoHide();
        } else {
            Toast::success('Ваш запрос принят и будет проверен модератором.')
                ->disableAutoHide();
        }

        return redirect()->route('meets');
    }

    /**
     * @param Meet $meet
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function delete(Request $request, Meet $meet)
    {
        $this->authorize('delete', $meet);

        $meet->delete();

        Toast::success('Событие удалено.')->disableAutoHide();

        return redirect()->route('profile.meets', $request->user());
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Enums\ScheduleEnum;
use App\Models\Position;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Support\Facades\Toast;

class PositionsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Tonysm\TurboLaravel\Http\MultiplePendingTurboStreamResponse|\Tonysm\TurboLaravel\Http\PendingTurboStreamResponse|null
     */
    public function jobs()
    {
        $positions = Position::approved()
            ->with(['author'])
            ->whereDate('created_at', '>=', now()->subMonth())
            ->orderBy('id', 'desc')
            ->cursorPaginate(3);

        return view('positions.index', [
            'positions' => $positions,
        ]);
    }

    /**
     * @param Position $position
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Position $position)
    {
        $position->load(['author']);

        return view('positions.show', [
            'position' => $position,
        ]);
    }

    public function edit(Request $request, Position $position)
    {
        $this->authorize('update', $position);

        return view('positions.edit', [

            'position' => $position,
        ]);
    }

    /**
     * @param Request  $request
     * @param Position $position
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function update(Request $request, Position $position)
    {
        $this->authorize('update', $position);

        $request->validate([
            'position'               => 'required|array',
            'position.title'         => 'required|string',
            'position.description'   => 'required|string',
            'position.organization'  => 'required|string',
            'position.salary_min'    => 'sometimes|numeric|nullable',
            'position.salary_max'    => 'sometimes|numeric|nullable',
            'position.location'      => 'sometimes|string|nullable',
            'position.schedule'      => [
                'required', Rule::enum(ScheduleEnum::class),
            ],
        ]);

        if ($position->exists) {
            $position->fill($request->input('position'))->save();
        } else {
            $position = new Position($request->input('position'));
            $request->user()->positions()->save($position);
        }

        if ($position->approved) {
            Toast::success('Изменения успешно сохранены.')
                ->disableAutoHide();
        } else {
            Toast::success('Ваш запрос принят и будет проверен модератором.')
                ->disableAutoHide();
        }

        return redirect()->route('position.show', $position);
    }

    /**
     * @param Request  $request
     * @param Position $position
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function delete(Request $request, Position $position)
    {
        $this->authorize('delete', $position);

        $position->delete();

        Toast::success('Вакансия удалена.')->disableAutoHide();

        return redirect()->route('jobs');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function list(Request $request)
    {
        $positions = Position::with(['author'])
            ->whereDate('created_at', '>=', now()->subMonth())
            ->orderBy('id', 'desc')
            ->cursorPaginate(3);

        return turbo_stream([
            turbo_stream()->removeAll('.position-placeholder'),
            turbo_stream()->append(
                'positions-frame',
                view('positions.list', [
                    'positions' => $positions,
                ])
            ),

            turbo_stream()->replace(
                'positions-more',
                view('positions.pagination', [
                    'positions' => $positions,
                ])
            ),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Tonysm\TurboLaravel\Http\MultiplePendingTurboStreamResponse|\Tonysm\TurboLaravel\Http\PendingTurboStreamResponse|null
     */
    public function latest()
    {
        $positions = Position::approved()
            ->with(['author'])
            ->whereDate('created_at', '>=', now()->subMonth())
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return view('positions.latest', [
            'positions' => $positions,
        ]);
    }
}

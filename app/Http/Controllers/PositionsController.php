<?php

namespace App\Http\Controllers;

use App\Casts\ScheduleEnum;
use App\Models\Position;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tonysm\TurboLaravel\Http\MultiplePendingTurboStreamResponse;
use Tonysm\TurboLaravel\Http\PendingTurboStreamResponse;

class PositionsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\View|\Tonysm\TurboLaravel\Http\MultiplePendingTurboStreamResponse|\Tonysm\TurboLaravel\Http\PendingTurboStreamResponse|null
     */
    public function jobs()
    {
        return view('positions.list',);
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
        $this->authorize('isOwner', $position);

        return view('positions.edit', [

            'position' => $position,
        ]);
    }

    /**
     * @param Request  $request
     * @param Position $position
     *
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Position $position)
    {

        $this->authorize('isOwner', $position);
        //dd($request->get('vacancy'));

        $validatedData = $request->validate([
            'position'              => 'required|array',
            'position.title'        => 'required|string',
            'position.description'  => 'required|string',
            'position.organization' => 'required|string',
            'position.salary_min'   => 'sometimes|numeric|nullable',
            'position.salary_max'   => 'sometimes|numeric|nullable',
            'position.experience'   => 'sometimes|numeric|nullable',
            'position.address'      => 'required|string',
            'position.schedule'     => [
                'required', Rule::enum(ScheduleEnum::class),
            ],
        ]);


        $position->fill(array_merge($request->get('position'), ['user_id' => $request->user()->id]))
            ->save();

        return redirect()->route('position.show', $position);
    }

    /**
     * @param Request  $request
     * @param Position $position
     *
     * @return MultiplePendingTurboStreamResponse|PendingTurboStreamResponse
     * @throws AuthorizationException
     */
    public function delete(Request $request, Position $position)
    {
        $this->authorize('isOwner', $position);

        $position->delete();
        //сюда поставить уведомление

        return turbo_stream()->remove($position);
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function list(Request $request)
    {
        $positions = Position::with(['author'])
            ->whereDate('created_at','>=',now()->subMonth())
            ->orderBy('id', 'desc')
            ->cursorPaginate(3);


        return turbo_stream([
            turbo_stream()->removeAll('.position-placeholder'),
            turbo_stream()->append(
                'positions-frame',
                view('particles.positions', [
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

}

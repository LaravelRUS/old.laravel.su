<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\Package;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        return view('packages.index');
    }

    public function edit(Request $request, Package $pack)
    {
        $this->authorize('isOwner', $pack);

        return view('packages.edit', [
            'pack' => $pack,
        ]);
    }

    /**
     * @param Request $request
     * @param Package $pack
     *
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Package $pack)
    {
        $this->authorize('isOwner', $pack);

        $request->validate([
            'pack'             => 'required|array',
            'pack.name'        => 'required|string',
            'pack.description' => 'required|string',
            'pack.packagist_name' => 'required|string',
            'pack.website'        => 'sometimes|url',
        ]);

        $pack->fill(array_merge($request->get('pack'), ['user_id' => $request->user()->id]))
            ->save();

        return redirect()->route('packages');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Post         $post
     *
     * @return \Tonysm\TurboLaravel\Http\MultiplePendingTurboStreamResponse|\Tonysm\TurboLaravel\Http\PendingTurboStreamResponse
     */
    public function delete( Package $pack)
    {
        $this->authorize('isOwner', $pack);

        $pack->delete();
        //сюда поставить уведомление

        return turbo_stream()->remove($pack);
    }
}

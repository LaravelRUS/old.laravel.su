<?php

namespace App\Http\Controllers;

use App\Casts\PackageTypeEnum;
use App\Models\Meet;
use App\Models\Package;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tonysm\TurboLaravel\Http\MultiplePendingTurboStreamResponse;
use Tonysm\TurboLaravel\Http\PendingTurboStreamResponse;

class PackagesController extends Controller
{
    public function index()
    {
        return view('packages.index');
    }

    public function edit(Request $request, Package $package)
    {
        $this->authorize('isOwner', $package);

        return view('packages.edit', [
            'pack' => $package,
        ]);
    }

    /**
     * @param Request $request
     * @param Package $pack
     *
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Package $package)
    {
        $this->authorize('isOwner', $package);

        $request->validate([
            'pack'                => 'required|array',
            'pack.name'           => 'required|string',
            'pack.description'    => 'required|string',
            'pack.packagist_name' => 'required|string',
            'pack.website'        => 'sometimes|url',
            'pack.type'           => ['required', Rule::enum(PackageTypeEnum::class)]
        ]);

        $package->fill(array_merge($request->get('pack'), ['user_id' => $request->user()->id]))
            ->save();

        return redirect()->route('packages');
    }

    /**
     * @param Package $pack
     *
     * @return MultiplePendingTurboStreamResponse|PendingTurboStreamResponse
     * @throws AuthorizationException
     */
    public function delete( Package $pack)
    {
        $this->authorize('isOwner', $pack);

        $pack->delete();
        //сюда поставить уведомление

        return turbo_stream()->remove($pack);
    }
}

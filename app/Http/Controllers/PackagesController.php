<?php

namespace App\Http\Controllers;

use App\Casts\PackageTypeEnum;
use App\Casts\SortEnum;
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
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|null
     */
    public function index(Request $request)
    {
        $packages = Package::approved()
            ->when($request->filled('type'), function ($query) use ($request) {
                return $query->where('type', $request->input('type'));
            })
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('q') . '%')
                    ->orWhere('packagist_name', 'like', '%' . $request->get('q') . '%')
                    ->orWhere('description', 'like', '%' . $request->get('q') . '%');
            })
            ->when($request->get('sort') === SortEnum::Latest->value,
                fn($query) => $query->latest(),
                fn($query) => $query->orderByDesc('stars'))
            ->paginate(6);

        return view('packages.index', [
            'packages' => $packages,
        ]);
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
            'packagist_name' => ['string', 'required', Rule::unique(Package::class, 'packagist_name')->ignore($package->packagist_name)],
            'type'           => ['required', Rule::enum(PackageTypeEnum::class)],
        ], [
            'packagist_name' => 'Пакет уже есть в каталоге или находиться на рассмотрении.',
        ]);

        $package->fill($request->all())->fill([
            'name'        => $request->input('packagist_name'),
            'description' => $request->input('packagist_name'),
        ]);

        $request->user()->packages()->saveMany([$package]);

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

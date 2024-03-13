<?php

namespace App\Http\Controllers;

use App\Models\Enums\PackageTypeEnum;
use App\Models\Enums\SortEnum;
use App\Models\Package;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Support\Facades\Toast;

class PackagesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|null
     */
    public function index(Request $request)
    {
        $currentCategory = PackageTypeEnum::tryFrom($request->input('type'));
        $currentSort = SortEnum::tryFrom($request->input('sort'));

        $packages = Package::approved()
            ->when($currentCategory !== null, fn ($query) => $query->where('type', $currentCategory->value))
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->get('q').'%')
                    ->orWhere('packagist_name', 'like', '%'.$request->get('q').'%')
                    ->orWhere('description', 'like', '%'.$request->get('q').'%');
            })
            ->when($currentSort === SortEnum::Latest,
                fn ($query) => $query->latest(),
                fn ($query) => $query->orderByDesc('stars'))
            ->paginate(6);

        return view('packages.index', [
            'packages'        => $packages,
            'currentCategory' => $currentCategory,
            'currentSort'     => $currentSort,
        ]);
    }

    public function edit(Request $request, Package $package)
    {
        $this->authorize('update', $package);

        return view('packages.edit', [
            'pack' => $package,
        ]);
    }

    /**
     * @param Request $request
     * @param Package $pack
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function update(Request $request, Package $package)
    {
        $this->authorize('update', $package);

        $request->validate([
            'packagist_name' => ['string', 'required', 'regex:/^[a-z0-9_\-]+\/[a-z0-9_\-]+$/i', Rule::unique(Package::class, 'packagist_name')->ignore($package->packagist_name)],
            'type'           => ['required', Rule::enum(PackageTypeEnum::class)],
        ], [
            'packagist_name.regex'  => 'Имя пакета имеет не верный формат.',
            'packagist_name.unique' => 'Пакет уже есть в каталоге или находиться на рассмотрении.',
        ]);

        $package->fill($request->all())->fill([
            'name'        => $request->input('packagist_name'),
            'description' => $request->input('packagist_name'),
        ]);

        $request->user()->packages()->saveMany([$package]);

        if ($package->approved) {
            Toast::success('Изменения успешно сохранены.')->disableAutoHide();
        } else {
            Toast::success('Ваш запрос принят и будет проверен модератором.')
                ->disableAutoHide();
        }

        return redirect()->route('packages');
    }

    /**
     * @param Package $pack
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function delete(Request $request, Package $package)
    {
        $this->authorize('delete', $package);

        $package->delete();

        Toast::success('Пакет удалён.')->disableAutoHide();

        return redirect()->route('profile.packages', $request->user());
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function latest()
    {
        $packages = Package::approved()
            ->whereDate('created_at', '>=', now()->subMonth())
            ->inRandomOrder()
            ->limit(3)->get();

        return view('packages.latest', [
            'packages' => $packages,
        ]);
    }
}

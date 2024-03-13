@extends('layout')
@section('title', $currentCategory ?  'Пакеты '. $currentCategory->text()  : 'Пакеты сообщества')

@section('content')

    <x-header image="/img/tablecloth.svg">
        <x-slot:sup>Пакеты сообщества</x-slot>
        <x-slot:title>Великолепные дополнения</x-slot>

        <x-slot:description>
            Наша цель — помочь русскоязычному сообществу найти новые и полезные пакеты Laravel в одном месте.
        </x-slot>

        <x-slot:actions>
            <a href="{{route('packages.create')}}" class="btn btn-primary btn-lg px-4">Предложить пакет</a>
            <a href="{{ route('ecosystem') }}"
               class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">Экосистема
                <x-icon path="i.arrow-right" class="bi" />
            </a>
        </x-slot>
    </x-header>

    <x-container>
        <x-turbo-frame id="packages" refresh="morph">
            <div class="row g-4 g-md-5 justify-content-center align-items-start position-relative mb-xl-5 mb-3">
                <div class="col-md-4 col-xl-3 d-none d-md-block">
                    <span class="display-6 fw-bold text-body-emphasis mb-4 text-balance">Категории</span>
                </div>
                <div class="col-md-8 col-xl-9">
                    <form class="row g-1 align-items-center justify-content-md-end" action="{{route('packages')}}" method="GET">

                        <div class="col-md-6 col-xl-3 mb-2 mb-md-0">
                            <div class="d-flex justify-content-between bg-body-secondary small px-3 py-1 py-md-2 rounded">
                                <input name="q" type="text" class="form-search d-inline-block bg-body-secondary rounded"
                                       placeholder="Поиск" value="{{ request()->query('q') }}">

                                @empty(!request()->query('q'))
                                    <a href="{{ route('packages') }}" class="btn btn-link icon-link text-secondary text-decoration-none">
                                        <x-icon path="i.close"/>
                                    </a>
                                @else
                                    <button type="submit" class="text-secondary fw-medium btn btn-link d-inline-flex align-items-center">
                                        <x-icon path="i.search" class="ms-2" />
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="col-12  d-md-none mb-2 mb-md-0">
                            <div class="d-flex bg-body-secondary small px-3 py-2 rounded">
                                <select class="form-search fw-medium w-100" name="type" onchange="this.form.requestSubmit()">
                                    <option
                                        @selected( !request()->filled('type'))
                                        value=""
                                    >
                                        Категории
                                    </option>
                                    @foreach(\App\Models\Enums\PackageTypeEnum::cases() as $type)
                                        <option value="{{$type->value}}" @selected($currentCategory == $type)>
                                            {{$type->text()}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-12 col-md-auto ms-md-3">
                            <div class="d-flex bg-body-secondary small px-3 py-2 py-md-3 rounded">
                                <select class="form-search fw-medium w-100"
                                        name="sort"
                                        onchange="this.form.requestSubmit()">
                                    @foreach(\App\Models\Enums\SortEnum::cases() as $sort)
                                        <option value="{{$sort->value}}" @selected($currentSort == $sort->value)>
                                            {{$sort->text()}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
            <div class="row g-4 g-md-5 justify-content-center align-items-start position-relative mb-5">
                <div class="col-md-4 col-xl-3 position-sticky top-0 d-none d-md-block">
                    @foreach(\App\Models\Enums\PackageTypeEnum::cases() as $type)
                        <div class="mb-4 position-relative">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon-small d-inline-flex align-items-center justify-content-center fs-4 rounded-3
                                 {{ $currentCategory == $type ? 'bg-primary text-white' : 'bg-body-secondary text-primary' }}">
                                    <x-icon path="{{$type->icon()}}"/>
                                </div>
                                <div class="ms-3 w-75">
                                    <a href="{{ route('packages', ['type' => $type]) }}"
                                       class="d-block lh-sm small fw-medium m-0 stretched-link link-body-emphasis text-decoration-none @if($currentCategory == $type->value) active @endif"
                                    >
                                        {{ $type->text() }}
                                    </a>
                                    <p class="small opacity-50 fw-normal m-0">
                                        {{ trans_choice('{1} :count пакет|[2,4] :count пакета|:count пакетов', \App\Models\Package::approved()->where('type', $type)->count()) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="col-md-8 col-xl-9">
                    @if($packages->isEmpty())
                        <div class="bg-body-tertiary rounded p-md-5 rounded">
                            <div class="p-4 p-md-5">
                                <div class="col-lg-7 mx-auto text-center mb-3">

                                    <p class="mb-3 fs-4">¯\_(ツ)_/¯</p>

                                    <p class="mb-0">Сейчас пакетов подходящих под требуемые условия не найдены.
                                                    Но в базе есть много других классных пакетов.</p>
                                </div>
                            </div>
                        </div>
                    @else

                        <div class="row row-cols-lg-2 row-cols-1 g-4">

                            @foreach($packages as $package)
                                @include('particles.package')
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </x-turbo-frame>
    </x-container>

@endsection

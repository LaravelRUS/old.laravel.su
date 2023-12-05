@extends('layout')
@section('title', 'Пакеты')

@section('content')

    <x-header image="/img/tablecloth.svg">
        <x-slot:sup>Пакеты сообщества</x-slot>
        <x-slot:title>Великолепные дополнения</x-slot>

        <x-slot:description>
            Наша цель — помочь русскоязычному сообществу найти новые и полезные пакеты Laravel в одном месте.
        </x-slot>

            {{--
        <x-slot:content>
            <div class="col-6 mx-auto">
                <img src="/img/gusli.svg" class="img-fluid">
            </div>
            <div class="position-relative">

                <!-- Svg decoration -->
                <figure class="position-absolute top-0 end-0 d-none d-md-block me-5">
                    <x-icon path="l.dots" class="text-primary opacity-2" height="400" width="400" />
                </figure>

                <pre class="rounded-3 position-relative overflow-hidden bg-dark p-4 text-white shadow language-php" tabindex="0"><code
                        class="language-php">// Получаем инсайты трендов для маркетинговой кампании
$trendInsights = $this->getTrendInsights();

// Запускаем кампанию с полученными данными
$campaignResults = $this->executeCampaign($trendInsights);

// Возвращаем результаты кампании
return response()->json([
    'status' => 'success',
    'campaignResults' => $campaignResults
]);
</code></pre>
            </div>
        </x-slot:content>
--}}

        <x-slot:actions>
            <a href="{{route('packages.create')}}" class="btn btn-primary btn-lg px-4">Предложить пакет</a>
            <a href="{{ route('ecosystem') }}"
               class="link-body-emphasis text-decoration-none link-icon-animation">Экосистема
                <x-icon path="bs.arrow-right" />
            </a>
        </x-slot>
    </x-header>

    <x-container>
        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-3">
                <span class="display-6 fw-bold text-body-emphasis mb-4 text-balance">Категории</span>
            </div>
            <div class="col-xl-9">
                <form class="row" action="{{route('packages')}}" method="GET">
                    <div class="col-md-3 d-flex bg-body-secondary small px-3 py-2 rounded ms-auto">

                        <input name="q" type="text" class="form-search  d-inline-block" placeholder="Поиск">
                        <button type="submit" class="text-dark fw-medium btn btn-link d-inline-flex align-items-center">
                            <x-icon path="bs.search" class="ms-2" />
                        </button>

                    </div>
                    <div class="col-auto d-flex bg-body-secondary small px-3 py-2 rounded ms-3">
                        <select class="form-search fw-medium" name="sort" onchange="this.form.requestSubmit()">
                            @foreach(\App\Casts\SortEnum::cases() as $sort)
                                <option value="{{$sort->value}}"
                                    @selected(request()->get('sort') == $sort->value)
                                >
                                        {{$sort->text()}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-3 position-sticky top-0">
                @foreach(\App\Casts\PackageTypeEnum::cases() as $type)
                    <div class="mb-4 position-relative">
                        <div class="d-flex align-items-center">
                            <div class="feature-icon-small d-inline-flex align-items-center justify-content-center
                            @if(request()->get('type')==$type->value) bg-light-danger @else bg-body-secondary @endif  text-danger fs-4 rounded-3">
                                <x-icon path="{{$type->icon()}}"/>
                            </div>
                            <div class="ms-3 w-75">
                                <a href="{{ route('packages', ['type' => $type]) }}"
                                   class="fs-6 fw-medium m-0 stretched-link link-body-emphasis text-decoration-none @if(request()->get('type')==$type->value) active @endif"
                                >
                                    {{ $type->text() }}
                                </a>
                                <p class="small opacity-50 fw-normal m-0">
                                    {{ \App\Models\Package::where('type', $type)->count() }} пакетов
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="col-xl-9">
                    @if($packages->isEmpty())
                    <div class=" bg-body-tertiary rounded p-5 rounded">
                        <div class="p-5">

                            <div class="text-center mb-3">
                                Пакеты не найдены
                            </div>
                        </div>
                    </div>
                @else

                    <div class="row row-cols-lg-2 row-cols-md-1 row-cols-sm-1 g-5">

                        @foreach($packages as $package)
                            @include('particles.package')

                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </x-container>


@endsection

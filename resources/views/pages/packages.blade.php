@extends('layout')
@section('title', 'Пакеты')

@section('content')

    <x-header image="/img/sign.svg">
        <x-slot:sup>Пакеты сообщества</x-slot>
        <x-slot:title>Великолепные дополнения</x-slot>

        <x-slot:description>
            Наша цель — помочь русскоязычному сообществу найти новые и полезные пакеты Laravel в одном месте.
        </x-slot>

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

        <x-slot:actions>
            <a href="#" class="btn btn-primary btn-lg px-4">Предложить новый пакет</a>
            <a href="#"
               class="link-body-emphasis text-decoration-none link-icon-animation">Критерии
                <x-icon path="bs.arrow-right" />
            </a>
        </x-slot>
    </x-header>

    <div class="container py-5">

        <div class="bg-body-secondary p-5 rounded">
            <div class="row row-cols-lg-3 row-cols-md-6 row-cols-sm-12 align-items-center g-5">

                @foreach (range(0, 9) as $package)
                    <div class="col">
                        <div class="bg-body-tertiary p-5 rounded h-100 position-relative text-wrap text-break position-relative">

                            @if($loop->index === 9)
                                <span class="badge bg-warning text-dark rounded-end-3 position-absolute end-0 top-0 mt-4">
                                    Лучшая админка
                                </span>
                            @endif

                            <p class="fs-4 fw-bolder">
                                Orchid
                            </p>

                            <hr class="w-25">

                            <p class="line-clamp o-50 line-clamp-5 small">
                                Мощное и простое в использовании решение для создания административных панелей и
                                бизнес-приложений
                                {{ \Illuminate\Support\Str::random(100) }}
                            </p>


                            <div class="row justify-content-between">
                                <div class="col-auto d-inline-flex align-items-center me-auto">
                                    <x-icon path="bs.star-fill" class="me-2 text-warning" />
                                    2324
                                </div>
                                <div class="col">
                                    <p class="text-end mb-0">
                                        <a href="#"
                                           class="link-body-emphasis stretched-link link-icon-animation text-decoration-none">Перейти
                                            <x-icon path="bs.arrow-right" />
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

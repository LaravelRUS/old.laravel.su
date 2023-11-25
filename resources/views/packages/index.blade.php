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
            <a href="#" class="btn btn-primary btn-lg px-4">Предложить пакет</a>
            <a href="{{ route('ecosystem') }}"
               class="link-body-emphasis text-decoration-none link-icon-animation">Экосистема
                <x-icon path="bs.arrow-right" />
            </a>
        </x-slot>
    </x-header>

    <x-container>
        <div class="bg-body-secondary p-5 rounded">
            <div class="row row-cols-lg-3 row-cols-md-6 row-cols-sm-12 align-items-center g-5">

                @foreach (\App\Models\Package::get() as $package)
                   @include('particles.package')
                @endforeach
            </div>
        </div>
    </x-container>


@endsection

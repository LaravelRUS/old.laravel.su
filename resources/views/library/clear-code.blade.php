@extends('layout')
@section('title', 'Чистый код')
@section('description', 'Код должен быть понятен всем членам команды и легко читаем для разработчиков,  которые могут внести изменения в него')
@section('content')

    <x-header align="align-items-end">
        <x-slot name="sup">Чистый код</x-slot>
        <x-slot name="title">Простые правила для вашего кода</x-slot>
        <x-slot name="description">
            Код должен быть понятен всем членам команды и легко читаем для разработчиков, которые могут внести изменения в него
        </x-slot>
        <x-slot name="content">
            {{--
            <div class="col-6 mx-auto">
                <img src="/img/gusli.svg" class="img-fluid">
            </div>
            --}}
            <div class="position-relative">

                <!-- Svg decoration -->
                {{--
                                    <figure class="position-absolute top-0 end-0 d-none d-md-block me-5">
                                        <x-icon path="l.dots" class="text-primary opacity-2" height="400" width="400" />
                                    </figure>
            --}}
                <pre class="rounded position-relative overflow-hidden bg-body p-4 text-white border border-dashed language-php" data-bs-theme="dark" tabindex="0" style="
    transform: rotate(350deg);"><code
                        class="language-php">// Получаем инсайты трендов для маркетинговой кампании
$trendInsights = $this->getTrendInsights();

// Запускаем кампанию с полученными данными
$campaignResults = $this->executeCampaign($trendInsights);

// Возвращаем результаты кампании
return response()->json([
    'status'          => Status::SUCCESS,
    'campaignResults' => $campaignResults
]);</code></pre>
            </div>
        </x-slot>
    </x-header>


@php
$sections = collect([
    'basics',
    'code-style',
    'abbr',
    'numbers',
    'else',
    'happy-path'
])
    ->map(fn ($file) => \Illuminate\Support\Str::of($file)->start('clear-code/'))
    ->map(fn ($file) => new \App\Library($file));
// TODO Один уровень вложености
@endphp

    @include('particles.library-section', ['sections' => $sections])
@endsection

@extends('layout')
@section('title', 'Актуальный код')
@section('description', 'Код должен быть понятен всем членам команды и легко читаем для разработчиков, которые могут его изменять')
@section('content')

    <x-header align="align-items-end">
        <x-slot name="sup">Разработчикам</x-slot>
        <x-slot name="title">Советы по безопасности</x-slot>
        <x-slot name="description">
            Распространенные ошибки в коде, приводящие к уязвимостям безопасности в приложениях на Laravel
        </x-slot>
        <x-slot name="content">
            <figure class="d-none d-md-block">
                <x-icon path="l.dots" class="text-primary opacity-2 d-block mx-auto" height="300" width="300"/>
            </figure>
        </x-slot>
    </x-header>

@php
    $sections = collect([
    'basics',
    'xss',
    'mass',
    // 'cookie', TODO: Распространён ли он?
    // 'csrf',  TODO: Распространён ли он?
    //'headers', TODO: Распространён ли он?
    'upload',
    'path',
    'redirect',
    'sql',
    'exec',
    'hijacking',
])
    ->map(fn ($file) => \Illuminate\Support\Str::of($file)->start('security/'))
    ->map(fn ($file) => new \App\Library($file));
@endphp

    @include('particles.library-section', ['sections' => $sections])

@endsection

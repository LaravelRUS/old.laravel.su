@extends('layout')
@section('title', 'Актуальный код')
@section('description', 'Код должен быть понятен всем членам команды и легко читаем для разработчиков, которые могут его изменять')
@section('content')

    <x-header align="align-items-end">
        <x-slot name="sup">Разработчикам</x-slot>
        <x-slot name="title">Советы по безопасности</x-slot>
        <x-slot name="description">
            Распространенные уязвимости и ошибки, для обеспечения безопасности ваших приложений Laravel
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
    'auth',
    'cookie',
    'mass',
    'csrf',
    'exec',
    'headers',
    'hijacking',
    'path',
    'redirect',
    'sql',
    'upload',
    'xss',
])
    ->map(fn ($file) => \Illuminate\Support\Str::of($file)->start('security/'))
    ->map(fn ($file) => new \App\Library($file));
@endphp

    @include('particles.library-section', ['sections' => $sections])

@endsection

@extends('layout')
@section('title', 'Почему нужно обновляться?')
@section('description', 'У любого программного обеспечения есть жизненный цикл, которого необходимо придерживаться.')
@section('content')

    <x-header>
        <x-slot:sup>Поддерживаемые версии</x-slot>
        <x-slot:title>Почему нужно обновляться?</x-slot>

        <x-slot:description>
            У любого программного обеспечения есть жизненный цикл,
            которого необходимо придерживаться
        </x-slot>

        <x-slot:content >
            <div class="d-none d-md-flex align-items-baseline lead fw-bold mx-md-auto text-md-center">
                <span class="d-inline-block mx-2 mx-sm-3 display-5 opacity-25">7.x</span>
                <span class="d-inline-block mx-2 mx-sm-3 display-4 opacity-50 border-5">8.x</span>
                <span class="d-inline-block mx-2 mx-sm-3 display-3 opacity-75">9.x</span>
                <span class="d-inline-block mx-2 mx-sm-3 display-1 border-bottom border-primary">10.x</span>
            </div>
        </x-slot:content>
    </x-header>

@php
    $sections = collect([
        "security",
        "labor-costs",
        "performance",
        "competitiveness",
])
    ->map(fn ($file) => \Illuminate\Support\Str::of($file)->start('upgrade/'))
    ->map(fn ($file) => new \App\Library($file));
@endphp

@include('particles.library-section', ['sections' => $sections])
@endsection

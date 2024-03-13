@extends('html')
@section('title', 'Сервис недоступен')

@section('body')
    <x-header image="/img/bird.svg">
        <x-slot:sup>Сервис недоступен</x-slot>
        <x-slot:title>Мы обновляемся</x-slot>

        <x-slot:description>
            Мы внесли улучшения и сейчас запустили обновление.
            Это займет некоторое время, но не волнуйтесь, мы скоро снова будем онлайн.
        </x-slot>

        <x-slot:actions>
            <a href="{{ url()->current() }}" class="btn btn-primary btn-lg px-4">Уже готово?</a>
        </x-slot>
    </x-header>
@endsection

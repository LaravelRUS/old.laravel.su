@extends('layout')
@section('title', 'Экосистема')

@section('content')

    <x-header image="/img/tablecloth.svg">
        <x-slot:sup>Официальная экосистема</x-slot>
        <x-slot:title>Без корпоративной сложности</x-slot>

        <x-slot:description>
            Обширная экосистема тщательно поддерживаемых пакетов гарантирует вашу готовность ко всему.
        </x-slot>

        <x-slot:actions>
            @auth
                <a href="{{route('packages.create')}}" class="btn btn-primary btn-lg px-4">Предложить пакет</a>
            @endauth
            <a href="{{ route('packages') }}"
               class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">Пакеты сообщества
                <x-icon path="i.arrow-right" class="bi" />
            </a>
        </x-slot>

    </x-header>

    <x-container>
        <div class="row row-cols-lg-3 g-4 g-md-5">
            @foreach (App\Ecosystem::items() as $ecosystemItemId => $ecosystemItem)
                <div class="col">
                    <a href="{{ $ecosystemItem['href'] }}"
                       class="d-flex align-items-stretch rounded link-body-emphasis text-decoration-none h-100 overflow-hidden bg-body-tertiary">
                        <div class="p-4 bg-gradient d-flex align-items-center" style="background: {{ $ecosystemItem['color'] ?? '' }}">
                            <img src="/img/ecosystem/{{ $ecosystemItemId }}.min.svg" alt="{{ $ecosystemItem['image-alt'] }}" width="48" height="48" class="relative">
                        </div>
                        <div class="p-4">
                            <h5 class="mb-2 fw-bolder">{{ $ecosystemItem['name'] }}</h5>
                            <div class="small opacity-75">{{ $ecosystemItem['description'] }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </x-container>


    <x-call-to-action link="{{ route('docs') }}" text="Посмотреть документацию">
        <x-slot:title>Мы лишь прикоснулись к поверхности.</x-slot>

        <x-slot:description>
            В Laravel есть все необходимое для создания веб-приложения, включая проверку электронной почты,
            ограничение скорости и пользовательские консольные команды.
        </x-slot>
    </x-call-to-action>

@endsection

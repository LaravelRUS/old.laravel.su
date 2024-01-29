@extends('layout')
@section('title', 'Ваш аккаунт забанен')

@section('content')
    <x-header image="/img/sign.svg">
        <x-slot:sup>Познакомьтесь с нашими</x-slot>
        <x-slot:title>Лидеры</x-slot>

        <x-slot:description>
            Эти дружелюбные люди продвигают русскоязычное сообщество Laravel, публикуя контент и делясь своим опытом.
        </x-slot>

        <x-slot:actions>
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4">Вернуться домой</a>
        </x-slot>
    </x-header>

    <x-container>
        <div class="row row-cols-xl-3 g-xxl-5">
            @foreach(range(1, 6) as $item)
                <div class="col">
                    <div class="bg-body-tertiary rounded p-xxl-5 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar avatar-sm me-3">
                                <a href="https://ru-laravel-project.test/profile/tabuna">
                                    <img class="avatar-img rounded-circle"
                                         src="https://avatars.githubusercontent.com/u/5102591?v=4" alt="">
                                </a>
                            </div>

                            <div class="small">
                                <h6 class="mb-0 me-4">
                                    Alexandr Chernyaev
                                </h6>
                                <small class="opacity-75 d-block">@tabuna</small>
                            </div>
                        </div>

                        <p class="mb-0 opacity-75">Creator of @orchidsoftware, @sajya. Self-employed. Back-end
                                                   developer.</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-container>
@endsection

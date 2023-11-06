@extends('html')

@section('body')
    <div class="bg-primary text-bg-primary bg-gradient text-center py-2">
        Скоро увидимся! Билеты уже доступны на <a href="{{ route('meets') }}" class="text-white">сайте</a>.
    </div>

    <div class="container mt-md-3 mb-3">
        <div class="row bg-body-tertiary py-4 px-5 rounded shadow">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
                <div class="col-md-auto mb-2 mb-md-0">
                    @guest
                        <a href="{{ route('home') }}">
                            <img src="https://laravel.su/images/logo.png" height="40">
                        </a>
                    @else
                        <a href="{{ route('feed') }}">
                            <img src="https://laravel.su/images/logo.png" height="40">
                        </a>
                        @endif
                    </div>

                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="{{ route('home') }}" class="nav-link px-3 link-body-emphasis">Главная</a></li>
                        <li><a href="{{ route('feature') }}" class="nav-link px-3 link-body-emphasis">Возможности</a></li>
                        <li><a href="{{ route('feed') }}" class="nav-link px-3 link-body-emphasis">Дискуссия</a></li>
                        <li><a href="{{ route('packages') }}" class="nav-link px-3 link-body-emphasis">Пакеты</a></li>
                        <li><a href="{{ route('resources') }}"
                                class="nav-link px-3 link-body-emphasis position-relative">Ресурсы
                                <span
                                    class="badge bg-primary position-absolute top-0 start-100 translate-middle mt-2">Новое</span></a>
                        </li>
                    </ul>

                    <div class="nav text-end">
                        <a href="{{ route('docs') }}" class="nav-link link-body-emphasis">Документация</a>

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Войти</a>
                        @else
                            <a href="{{ route('profile', auth()->user()) }}"
                                class="link-dark btn avatar avatar-sm text-bg-dark border border-tertiary-subtle p-0">
                                <img src="{{ auth()->user()->avatar }}" class="avatar-img rounded-circle">
                            </a>
                            @endif
                        </div>
                    </header>
                </div>
            </div>

            @yield('content')

            <div class="mt-5 pe-none">
                <img src="/img/sun.svg" class="w-100 object-fit-cover" style="object-position: top center;">
            </div>
            <div class="bg-dark-subtle text-white" data-bs-theme="dark">
                <div class="container py-5">
                    <footer class="row py-md-5 g-4 justify-content-between navbar-dark">
                        <div class="col-12 col-md-4">
                            <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                                <img src="https://laravel.su/images/logo.png" style="
    object-fit: contain;
    height: 45px;">
                            </a>

                            <ul class="nav justify-content-start align-items-center list-unstyled d-flex my-4">
                                <li class="">
                                    <a href="#" class="link-body-emphasis">
                                        <x-icon path="bs.twitter" width="24" height="24" />
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a class="link-body-emphasis" href="#">
                                        <x-icon path="bs.youtube" width="24" height="24" />
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a class="link-body-emphasis" href="#">
                                        <x-icon path="bs.telegram" width="24" height="24" />
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a class="link-body-emphasis" href="{{ asset('https://github.com/laravelRus') }}"
                                        target="_blank">
                                        <x-icon path="bs.github" width="24" height="24" />
                                    </a>
                                </li>
                            </ul>

                            <p class="small text-muted mb-0">Laravel является торговой маркой Taylor Otwell</p>
                            <p class="small text-muted">2023 © Laravel Framework Russian Community</p>
                        </div>

                        <div class="col-6 col-md-auto">
                            <p class="fw-normal text-white">Ресурсы комьюнити</p>

                            <div class="navbar navbar-dark">
                                <ul class="nav flex-column navbar-nav">
                                    <li class="nav-item mb-2">
                                        <a href="{{ route('meets') }}" class="nav-link p-0">Конференции</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="{{ route('advertising') }}" class="nav-link p-0">Партнёрство</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="{{ route('team') }}" class="nav-link p-0">Команда</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="{{ route('performance') }}" class="nav-link p-0">Производительность</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="{{ route('status') }}" class="nav-link p-0">Статус переводов</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-6 col-md-auto">
                            <p class="fw-normal text-white">Обучающие материалы</p>
                            <div class="navbar navbar-dark">
                                <ul class="nav flex-column navbar-nav">
                                    <li class="nav-item mb-2">
                                        <a href="{{ asset('https://github.com/laravelRus') }}" class="nav-link p-0">Исходный
                                            код</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="{{ asset('https://github.com/LaravelRUS/chat') }}"
                                            class="nav-link p-0">Правила</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="{{ asset('https://www.youtube.com/watch?v=jxtRs0GrhsY&list=PLM-y77GFP_D0Pd2bstscfHCuttLi6Z7Kd') }}"
                                            class="nav-link p-0">Подкаст</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-auto">
                            {{-- <p class="fw-normal text-white">Блоги разработчиков</p> --}}
                            <div class="navbar navbar-dark">
                                {{--
               <ul class="nav flex-column navbar-nav">
                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Laravel Orchid</a></li>
                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Laravel Idea</a></li>
                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0">SleepingOwl Admin</a></li>
                   <li class="nav-item mb-2"><a href="{{ asset('https://vk.com/laravel_rus?w=app5727453_-53758340') }}" class="nav-link p-0">Помощь проекту</a></li>
                </ul>
                --}}

                                <div class="nav flex-column">
                                    <form data-controller="theme" data-action="change->theme#toggleTheme" data-turbo-permanent
                                        class="btn-group" role="group" aria-label="Тема оформления" id="theme-checker-group">
                                        <input type="radio" value="auto" data-theme-target="preferred" class="btn-check"
                                            name="theme-checker" id="theme-checker-auto" autocomplete="off" checked>
                                        <label class="btn btn-outline-secondary" for="theme-checker-auto">
                                            <x-icon path="bs.circle-half" />
                                        </label>

                                        <input type="radio" value="light" data-theme-target="preferred" class="btn-check"
                                            name="theme-checker" id="theme-checker-light" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="theme-checker-light">
                                            <x-icon path="bs.sun-fill" />
                                        </label>

                                        <input type="radio" value="dark" data-theme-target="preferred" class="btn-check"
                                            name="theme-checker" id="theme-checker-dark" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="theme-checker-dark">
                                            <x-icon path="bs.moon-stars-fill" />
                                        </label>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </footer>
                </div>
            </div>

            @include('particles.back-to-top')
        @endsection

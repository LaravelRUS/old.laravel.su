<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">

    <meta name="csrf-token" content="{{  csrf_token() }}">
    <meta name="view-transition" content="same-origin"/>

    <x-meta
        title="{!! View::getSection('title') !!}"
        description="{!! View::getSection('description') !!}"
        {{-- image="{{ asset('/img/external.png') }}" --}}
        {{-- csp="*.laravel.su *.gravatar.com *.githubusercontent.com" --}}
    />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<body>


<div class="container my-3">
    <div class="row bg-white py-4 px-5 rounded shadow">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
            <div class="col-md-auto mb-2 mb-md-0">
                <a href="{{ route('home') }}">
                    <img src="https://laravel.su/images/logo.png" height="40">
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-3 link-body-emphasis">Главная</a></li>
                <li><a href="{{ route('feature') }}" class="nav-link px-3 link-body-emphasis">Возможности</a></li>
                <li><a href="{{ route('discussion') }}" class="nav-link px-3 link-body-emphasis">Дискуссия</a></li>
                <li><a href="#" class="nav-link px-3 link-body-emphasis position-relative">Ресурсы <span
                            class="badge bg-primary position-absolute top-0 start-100 translate-middle mt-2">Новое</span></a>
                </li>
            </ul>

            <div class="nav text-end">
                <a href="{{ route('docs') }}" class="nav-link link-body-emphasis">Документация</a>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Войти</a>
                @else

                    <x-logout class="link-dark btn avatar avatar-sm text-bg-dark border border-primary-subtle p-0"
                              formId="sign-out">
                        <img src="{{ auth()->user()->avatar }}" class="avatar-img rounded-circle">
                    </x-logout>

                @endif
            </div>
        </header>
    </div>
</div>


@yield('content')


<div class="bg-dark text-white mt-5" data-bs-theme="dark">
    <div class="container py-5">
        <footer class="row py-5 justify-content-between navbar-dark">
            <div class="col-4 mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="https://laravel.su/images/logo.png" style="
    object-fit: contain;
    height: 45px;">
                </a>


                <ul class="nav justify-content-start align-items-center list-unstyled d-flex my-4">
                    <li class="">
                        <a href="#" class="link-body-emphasis">
                            <x-icon path="bs.twitter" width="24" height="24"/>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-body-emphasis" href="#">
                            <x-icon path="bs.youtube" width="24" height="24"/>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-body-emphasis" href="#">
                            <x-icon path="bs.telegram" width="24" height="24"/>
                        </a>
                    </li>
                </ul>


                <p class="small text-muted mb-0">Laravel является торговой маркой Taylor Otwell</p>
                <p class="small text-muted">2023 © Laravel Framework Russian Community</p>
            </div>


            <div class="col-auto mb-3">
                <p class="fw-normal text-white">Ресурсы комьюнити</p>

                <div class="navbar navbar-dark">
                    <ul class="nav flex-column navbar-nav">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Правила</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Исходники</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Sentry</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Помощь проекту</a></li>
                    </ul>
                </div>

            </div>

            <div class="col-auto mb-3">
                <p class="fw-normal text-white">Обучающие материалы</p>
                <div class="navbar navbar-dark">
                    <ul class="nav flex-column navbar-nav">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Правила</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Исходники</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Sentry</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Помощь проекту</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-auto mb-3">
                <p class="fw-normal text-white">Блоги разработчиков</p>
                <div class="navbar navbar-dark">
                    <ul class="nav flex-column navbar-nav">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Правила</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Исходники</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Sentry</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Помощь проекту</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>


</body>
</html>


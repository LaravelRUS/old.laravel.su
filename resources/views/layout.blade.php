@extends('html')

@section('body')

    <div class="bg-primary text-bg-primary bg-gradient text-center py-2 d-none d-xxl-block">
        Любите загадки? Событие еще доступно на  <a href="{{ route('quiz.open') }}" class="text-white">сайте</a>.
    </div>



    <div class="container mt-md-4 mb-3">
        <div class="my-2 my-lg-4">
            <header class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="col-md-auto d-lg-none me-2 me-sm-3">
                    <a href="{{ route('nav') }}" class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center">
                        <x-icon path="i.logo" height="2em" width="2em" class="me-2" />
                        <x-icon path="i.menu" height="2em" width="2em" />
                    </a>
                </div>
                <div class="col-md-auto me-auto me-lg-2">
                    <a href="{{ route('home') }}">
                        <img src="/img/logo.svg" height="40" class="d-lg-inline d-none pe-none">
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 d-none d-lg-flex">
                    <li><a href="{{ route('feature') }}" class="nav-link px-3 link-body-emphasis">Возможности</a></li>
                    <li><a href="{{ route('feed') }}" class="nav-link px-3 link-body-emphasis">Трибуна</a></li>
                    <li><a href="{{ route('packages') }}" class="nav-link px-3 link-body-emphasis">Пакеты</a></li>
                    <li><a href="{{ route('jobs') }}" class="nav-link px-3 link-body-emphasis">Работа</a></li>
                    <li><a href="{{ route('courses') }}" class="nav-link px-3 link-body-emphasis position-relative">Курсы
                            <span class="badge bg-primary position-absolute top-0 start-100 translate-middle mt-2">Новое</span></a>
                    </li>

                    {{-- TODO: Add dropdown menu --}}
                    {{--
                    <li class="dropdown-menu-end">
                        <a href="#" class="nav-link px-3 link-body-emphasis dropdown-toggle" data-bs-toggle="dropdown">Ресурсы</a>
                        <div class="dropdown-menu bg-body-tertiary shadow-lg border-0 p-0">
                            <div class="d-lg-flex p-5 gap-4">
                                <ul class="list-unstyled d-flex flex-column gap-4" style="width: 15rem;">
                                    <li>
                                        <a href="{{ route('packages') }}" class="link-body-emphasis text-decoration-none rounded-2 d-flex align-items-start gap-3 lh-sm text-start">
                                            <x-icon path="i.ui" height="2em" width="2em" class="text-primary" />
                                            <div>
                                                <span class="d-block">Пакеты</span>
                                                <small class="opacity-50 line-clamp line-clamp-2">Великолепные дополнения сообщества</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('idea.index') }}" class="link-body-emphasis text-decoration-none rounded-2 d-flex align-items-start gap-3 lh-sm text-start">
                                            <x-icon path="i.idea1" height="2em" width="2em" />
                                            <div>
                                                <span class="d-block">Laravel Idea</span>
                                                <small class="opacity-50 line-clamp line-clamp-2">
                                                    Генерация кода для PHPStorm
                                                </small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meets') }}" class="link-body-emphasis text-decoration-none rounded-2 d-flex align-items-start gap-3 lh-sm text-start">
                                            <x-icon path="i.previous_meetings" height="2em" width="2em" class="text-primary" />
                                            <div>
                                                <span class="d-block">Мероприятия</span>
                                                <small class="opacity-50 line-clamp line-clamp-2">
                                                    Ни одна встреча не обходится без Laravel.
                                                </small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex flex-column gap-4" style="width: 15rem;">
                                    <li>
                                        <a href="#" class="link-body-emphasis text-decoration-none rounded-2 d-flex align-items-start gap-3 lh-sm text-start">
                                            <x-icon path="i.docs" height="2em" width="2em" />
                                            <div>
                                                <span class="d-block">Пакеты</span>
                                                <small class="opacity-50 line-clamp line-clamp-2">Великолепные дополнения сообщества</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ecosystem') }}" class="link-body-emphasis text-decoration-none rounded-2 d-flex align-items-start gap-3 lh-sm text-start">
                                            <x-icon path="i.internet-market" height="2em" width="2em" class="text-primary"/>
                                            <div>
                                                <span class="d-block">Экосистема</span>
                                                <small class="opacity-50 line-clamp line-clamp-2">Без корпоративной сложности</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pastebin') }}" class="link-body-emphasis text-decoration-none rounded-2 d-flex align-items-start gap-3 lh-sm text-start">
                                            <x-icon path="i.code" height="2em" width="2em" class="text-primary"/>
                                            <div>
                                                <span class="d-block">Pastebin</span>
                                                <small class="opacity-50 line-clamp line-clamp-2">Делитесь своим кодом правильно</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
    --}}
                </ul>

                <div class="nav text-end">
                    <a href="{{ route('docs') }}" class="nav-link link-body-emphasis d-none d-md-inline-flex">Документация</a>
                    <a href="{{ route('nav.docs') }}" class="nav-link link-body-emphasis d-md-none">
                        <x-icon path="i.docs" height="1.5em" width="1.5em" />
                    </a>

                    <a href="{{ route('profile.notifications') }}" class="nav-link link-body-emphasis position-relative">
                        <x-icon path="i.bell" height="1.5em" width="1.5em" />

                        @if(auth()->user() == null || auth()->user()->unreadNotifications()->exists())
                            <span class="position-absolute bottom-0 start-70 translate-middle p-1 bg-primary rounded-circle">
                              <span class="visually-hidden">Есть не прочитанные уведомления</span>
                        </span>
                        @endif
                    </a>

                    @guest
                        <a href="{{ route('login') }}"
                           class="avatar avatar-sm position-relative">
                            <img src="{{ asset('img/ui/avatar.png')}}" class="avatar-img rounded-circle border border-tertiary-subtle">
                        </a>
                    @else
                        <a href="{{ route('profile', auth()->user()) }}"
                           class="avatar avatar-sm position-relative">
                            <img src="{{ auth()->user()->avatar }}" class="avatar-img rounded-circle border border-tertiary-subtle">
                        </a>
                    @endif
                </div>
            </header>
        </div>
    </div>

    @yield('content')

    <div class="mt-5 pe-none d-none d-md-block">
        <img src="/img/sun.svg" class="w-100 object-fit-cover footer-sun pe-none">
    </div>
    <div class="bg-dark-subtle text-white d-none d-md-block" data-bs-theme="dark">
        <div class="container py-5">
            <footer class="row py-md-5 g-4 justify-content-between navbar-dark">
                <div class="col-12 col-md-4">
                    <ul class="nav justify-content-start align-items-center list-unstyled d-flex mb-4">
                        <li class="">
                            <a href="https://vk.com/laravel_rus" target="_blank" class="link-body-emphasis">
                                <x-icon path="i.vk" width="24" height="24"/>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a href="https://t.me/laravelrus" target="_blank" class="link-body-emphasis">
                                <x-icon path="bs.telegram" width="24" height="24"/>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="link-body-emphasis" href="{{ asset(config('services.github.org_url')) }}"
                               target="_blank">
                                <x-icon path="bs.github" width="24" height="24"/>
                            </a>
                        </li>


                        <li class="ms-3">
                            <a href="https://www.youtube.com/@laravelrus" target="_blank" class="link-body-emphasis">
                                <x-icon path="bs.youtube" width="24" height="24"/>
                            </a>
                        </li>


                        <li class="ms-3">
                            <a class="link-body-emphasis" href="{{ asset('/rss/feed') }}"
                               target="_blank">
                                <x-icon path="bs.rss-fill" width="24" height="24"/>
                            </a>
                        </li>
                    </ul>

                    <p class="small text-muted mb-2">
                        Веб-сайт является неофициальным ресурсом, посвященным Laravel. Мы объединяем разработчиков и
                        энтузиастов, желающих обмениваться знаниями и опытом. Мы не имеем официального статуса от
                        <a href="https://laravel.com" target="_blank" rel="nofollow" class="link-body-emphasis">Laravel</a> или <a href="https://github.com/taylorotwell" target="_blank" rel="nofollow" class="link-body-emphasis">Taylor Otwell</a>.
                    </p>
                    <p class="small text-muted">
                        Логотип Laravel и другие сопутствующие товарные знаки принадлежат их законным
                        владельцам.
                    </p>
                </div>

                <div class="col-6 col-md-auto">
                    <p class="fw-normal text-white">Ресурсы сообщества</p>

                    <div class="navbar navbar-dark">
                        <ul class="nav flex-column navbar-nav">
                            <li class="nav-item mb-2">
                                <a href="{{ route('home') }}" class="nav-link p-0">Домашняя страница</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('why-laravel') }}" class="nav-link p-0">Почему Laravel?</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('feature') }}" class="nav-link p-0">Возможности</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('meets') }}" class="nav-link p-0">Мероприятия</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('ecosystem') }}" class="nav-link p-0">Экосистема</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('packages') }}" class="nav-link p-0">Пакеты</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('jobs') }}" class="nav-link p-0">Вакансии</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-6 col-md-auto">
                    <p class="fw-normal text-white">Взаимодействие</p>
                    <div class="navbar navbar-dark">
                        <ul class="nav flex-column navbar-nav">
                            <li class="nav-item mb-2">
                                <a href="{{ route('advertising') }}" class="nav-link p-0">Партнёрство</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('donate') }}" class="nav-link p-0">Сделать пожертвование</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('assets') }}"
                                   class="nav-link p-0">Графические материалы</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('rules') }}"
                                   class="nav-link p-0">Правила сообщества</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('status') }}" class="nav-link p-0">Статус переводов</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('contributors') }}" class="nav-link p-0">Участники</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('pastebin') }}" class="nav-link p-0">Кодоран</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-auto">
                    <div class="navbar navbar-dark">
                        <div class="nav flex-column">
                            <form data-controller="theme" data-action="change->theme#toggleTheme" data-turbo-permanent
                                  class="btn-group" role="group" aria-label="Тема оформления" id="theme-checker-group">
                                <input type="radio" value="auto" data-theme-target="preferred" class="btn-check"
                                       name="theme-checker" id="theme-checker-auto" autocomplete="off" checked>
                                <label class="btn btn-outline-secondary d-inline-flex align-items-center py-2" for="theme-checker-auto">
                                    <x-icon path="i.theme-auto" class="my-1" width="1rem" height="1rem" />
                                </label>

                                <input type="radio" value="light" data-theme-target="preferred" class="btn-check"
                                       name="theme-checker" id="theme-checker-light" autocomplete="off">
                                <label class="btn btn-outline-secondary d-inline-flex align-items-center" for="theme-checker-light">
                                    <x-icon path="i.theme-light" class="my-1" width="1rem" height="1rem" />
                                </label>

                                <input type="radio" value="dark" data-theme-target="preferred" class="btn-check"
                                       name="theme-checker" id="theme-checker-dark" autocomplete="off">
                                <label class="btn btn-outline-secondary d-inline-flex align-items-center" for="theme-checker-dark">
                                    <x-icon path="i.theme-dark" class="my-1" width="1rem" height="1rem" />
                                </label>
                            </form>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>


    @include('particles.toast')
    {{-- @include('particles.mobile-menu') --}}
    @include('particles.back-to-top')
@endsection

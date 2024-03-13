@extends('html')
@section('title', 'Навигация по сайту')

@section('body')

    <div class="p-5 mh-100 mw-100 d-flex flex-column">

        <div class="col">
            <a href="{{ route('home') }}"
               class="d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-start text-body-secondary text-decoration-none">
                <x-icon path="i.home" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>

                <span>
                    <h5 class="mb-0">Главная</h5>
                    <small class="opacity-50">
                        Общие сведения о фреймворке Laravel и его окружении
                    </small>
                </span>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('feature') }}"
               class="d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-start text-body-secondary text-decoration-none">
                <x-icon path="i.possibility" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>

                <span>
                    <h5 class="mb-0">Возможности</h5>
                    <small class="opacity-50">
                        С Laravel вы можете реализовать всё, что угодно
                    </small>
                </span>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('feed') }}"
               class="d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-start text-body-secondary text-decoration-none">
                <x-icon path="i.tribune" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>

                <span>
                    <h5 class="mb-0">Трибуна</h5>
                    <small class="opacity-50">
                        Интересные статьи и общение на важные темы
                    </small>
                </span>
            </a>
        </div>


        <div class="col">
            <a href="{{ route('packages') }}"
               class="d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-start text-body-secondary text-decoration-none">
                <x-icon path="i.package" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>

                <span>
                    <h5 class="mb-0">Пакеты</h5>
                    <small class="opacity-50">
                        Подборка инструментов, облегчающих вашу работу
                    </small>
                </span>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('jobs') }}"
               class="d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-start text-body-secondary text-decoration-none">
                <x-icon path="i.jobs" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>

                <span>
                    <h5 class="mb-0">Работа</h5>
                    <small class="opacity-50">
                        Вакансии подобранные для специалистов Laravel
                    </small>
                </span>
            </a>
        </div>


        <div class="col">
            <a href="{{ route('courses') }}"
               class="d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-start text-body-secondary text-decoration-none">
                <x-icon path="i.courses" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>

                <span>
                    <h5 class="mb-0">Курсы</h5>
                    <small class="opacity-50">
                        Наилучший способ изучать Laravel на русском языке
                    </small>
                </span>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('meets') }}"
               class="d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-start text-body-secondary text-decoration-none">
                <x-icon path="i.meets" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>

                <span>
                    <h5 class="mb-0">Встречи</h5>
                    <small class="opacity-50">
                        Конференции, собрания, митапы с ведущими специалистами
                    </small>
                </span>
            </a>
        </div>

        <hr class="w-75">


        <ul class="nav flex-column navbar-nav">
            <li class="nav-item mb-2">
                <a href="{{ route('pastebin') }}" class="nav-link p-0">Кодоран</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('ecosystem') }}" class="nav-link p-0">Экосистема</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('advertising') }}" class="nav-link p-0">Партнёрство</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('contributors') }}" class="nav-link p-0">Участники</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('status') }}" class="nav-link p-0">Статус переводов</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('rules') }}"
                   class="nav-link p-0">Правила сообщества</a>
            </li>
        </ul>

        <p class="small text-muted mb-2 mt-5">
            Веб-сайт является неофициальным ресурсом, посвященным Laravel. Мы объединяем разработчиков и
            энтузиастов, желающих обмениваться знаниями и опытом. Мы не имеем официального статуса от
            <a href="https://laravel.com" class="link-body-emphasis">Laravel</a> или Taylor Otwell.
        </p>
        <p class="small text-muted">
            Логотип Laravel и другие сопутствующие товарные знаки принадлежат их законным
            владельцам.
        </p>
    </div>


@endsection

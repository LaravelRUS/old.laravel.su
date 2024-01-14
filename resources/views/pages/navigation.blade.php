@extends('html')

@section('body')

    <div class="p-5 mh-100 mw-100 d-flex flex-column">

        <li class="col d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start mb-3">
            <x-icon path="i.livewire" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
            <a href="{{ route('home') }}"
               class="text-body-secondary text-decoration-none"
               data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                <h5 class="mb-0">Главная</h5>
                <small class="opacity-50">Реактивные шаблоны, построенные с помощью PHP</small>
            </a>
        </li>

        <li class="col d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start mb-3">
            <x-icon path="i.livewire" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
            <a href="{{ route('feature') }}"
               class="text-body-secondary text-decoration-none"
               data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                <h5 class="mb-0">Возможности</h5>
                <small class="opacity-50">Реактивные шаблоны, построенные с помощью PHP</small>
            </a>
        </li>

        <li class="col d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start mb-3">
            <x-icon path="i.livewire" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
            <a href="{{ route('feed') }}"
               class="text-body-secondary text-decoration-none"
               data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                <h5 class="mb-0">Трибуна</h5>
                <small class="opacity-50">Реактивные шаблоны, построенные с помощью PHP</small>
            </a>
        </li>

        <li class="col d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start mb-3">
            <x-icon path="i.livewire" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
            <a href="{{ route('packages') }}"
               class="text-body-secondary text-decoration-none"
               data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                <h5 class="mb-0">Пакеты</h5>
                <small class="opacity-50">Реактивные шаблоны, построенные с помощью PHP</small>
            </a>
        </li>

        <li class="col d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start mb-3">
            <x-icon path="i.livewire" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
            <a href="{{ route('jobs') }}"
               class="text-body-secondary text-decoration-none"
               data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                <h5 class="mb-0">Работа</h5>
                <small class="opacity-50">Реактивные шаблоны, построенные с помощью PHP</small>
            </a>
        </li>


        <li class="col d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-start">
            <x-icon path="i.livewire" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
            <a href="{{ route('courses') }}"
               class="text-body-secondary text-decoration-none"
               data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                <h5 class="mb-0">Курсы</h5>
                <small class="opacity-50">Реактивные шаблоны, построенные с помощью PHP</small>
            </a>
        </li>

        <li class="col d-flex gap-4 rounded p-3 p-xxl-4 align-items-center align-items-start">
            <x-icon path="i.livewire" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
            <a href="{{ route('meets') }}"
               class="text-body-secondary text-decoration-none"
               data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                <h5 class="mb-0">Встречи</h5>
                <small class="opacity-50">Реактивные шаблоны, построенные с помощью PHP</small>
            </a>
        </li>

        <hr class="w-75">


        <ul class="nav flex-column navbar-nav">
            <li class="nav-item mb-2">
                <a href="{{ route('ecosystem') }}" class="nav-link p-0">Экосистема</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('advertising') }}" class="nav-link p-0">Партнёрство</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('team') }}" class="nav-link p-0">Команда</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('status') }}" class="nav-link p-0">Статус переводов</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ asset('https://github.com/laravel-russia') }}" class="nav-link p-0">
                    Исходный код
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ asset('https://github.com/laravel-russia') }}" class="nav-link p-0">
                    Сообщить о проблеме
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ asset('https://github.com/LaravelRUS/chat') }}"
                   class="nav-link p-0">Правила сообщества</a>
            </li>
        </ul>
    </div>


@endsection

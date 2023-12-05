@extends('layout')
@section('title', 'Курсы')

@section('content')


    <x-container>
        <div class="row align-items-md-stretch overflow-hidden">
            <div class="col-lg-8">
                <div class="h-100 bg-body-tertiary rounded">
                    <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video"
                                allowfullscreen></iframe>
                    </div>

                    <div class="p-5">
                        <h2 class="mb-3">Начните работать с Laravel</h2>
                        <p class="mb-3">
                            Впервые здесь? Посмотрите наше краткое вводное видео о том, как загрузить и запустить новое
                            приложение Laravel всего за две минуты!
                        </p>

                        <a href="{{ route('advertising') }}" class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                            Посмотрите вступление
                            <x-icon path="bs.arrow-right" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-body-tertiary rounded p-4">
                    <div class="mb-2 d-flex align-items-baseline mx-3">
                        Начинаем работать
                        <span class="ms-auto">11 видео</span>
                    </div>

                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline active"
                           aria-current="true">
                            Установка
                            <span class="ms-auto">3:34</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Действия
                            <span class="ms-auto">5:53</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Свойства
                            <span class="ms-auto">7:40</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Маршрутизация
                            <span class="ms-auto">4:22</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Прослойки
                            <span class="ms-auto">6:15</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Контроллеры
                            <span class="ms-auto">9:05</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Запросы и ответы
                            <span class="ms-auto">8:30</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Представления
                            <span class="ms-auto">5:45</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Шаблонизация Blade
                            <span class="ms-auto">4:50</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Миграции Базы Данных
                            <span class="ms-auto">7:25</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Посев Данных
                            <span class="ms-auto">6:40</span>
                        </a>
                        <a class="list-group-item list-group-item-action disabled text-center opacity-50" aria-disabled="true">Скоро</a>
                    </div>
                </div>
            </div>
        </div>
    </x-container>

    <x-container>
        <div class="row g-4">
            <div class="col-lg-6 position-relative overflow-hidden">
                <div class="bg-primary bg-opacity-10 rounded-3 p-5 h-100">
                    <img src="/img/sign.svg" class="position-absolute w-50 bottom-0 end-0">
                    <div class="row">
                        <div class="col-sm-8 position-relative">
                            <h3 class="mb-2 fw-bold">Сертификат</h3>
                            <p class="mb-5 h5 fw-light lead">Получите сертификат для вас как профессионала.</p>
                            <a href="#" class="btn btn-primary mb-0">Посмотреть программу</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 position-relative overflow-hidden">
                <div class="bg-secondary rounded-3 bg-opacity-10 p-5 h-100">
                    <img src="/img/sign.svg" class="position-absolute w-50 bottom-0 end-0">
                    <div class="row">
                        <div class="col-sm-8 position-relative">
                            <h3 class="mb-2 fw-bold">Лучше курсы</h3>
                            <p class="mb-5 h5 fw-light lead">Запишитесь сейчас на самые популярные курсы.</p>
                            <a href="#" class="btn btn-warning mb-0">Посмотреть курс</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>

    {{--
        <x-header image="/img/porridge.svg">
            <x-slot:sup>Всё наглядно</x-slot>
            <x-slot:title>Учитесь с Laravel</x-slot>

            <x-slot:description>
                Независимо от того, являетесь ли вы новичком или уже используете Laravel, тут собраны учебные материалы,
                которые помогут вам освоить фреймворк и разработку в целом.
            </x-slot>
        </x-header>


        <div class="container py-5">
            <div class="row align-items-md-stretch g-0 rounded-3 overflow-hidden">
                <div class="col-md-6">
                    <div class="h-100 position-relative">
                        <img src="https://i3.ytimg.com/vi/jQITs6C-GjU/maxresdefault.jpg" class="d-block h-100 w-100 object-fit-cover" style="aspect-ratio: 16/9;">
                        <a href="#" class="position-absolute top-0 start-0 end-0 bottom-0 bg-black opacity-75">

                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-secondary-subtle">
                        <h2 class="mb-3">Начните работать с Laravel</h2>
                        <p class="mb-3">
                            Впервые здесь? Посмотрите наше краткое вводное видео о том, как загрузить и запустить новое
                            приложение Laravel всего за две минуты!
                        </p>

                        <a href="{{ route('advertising') }}" class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                            Посмотрите вступление
                            <x-icon path="bs.arrow-right" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row row-cols-lg-3 row-cols-md-6 row-cols-sm-12 align-items-center g-5 py-5">

                @foreach (range(0, 9) as $package)
                    <div class="col">
                        <div class="bg-body-tertiary rounded h-100 position-relative overflow-hidden">
                            <img src="/img/logos/course.jpg" class="w-100 object-fit-cover">
                            <div class="p-5 pt-3">
                                <div class="row justify-content-between mb-4">
                                    <div class="col">
                                        <span class="badge bg-warning text-dark rounded-1">
                                            Новичок
                                        </span>
                                    </div>
                                </div>

                                <p class="fs-4 lh-1">
                                    Полное руководство для начинающих
                                </p>

                                <div class="d-flex align-items-baseline align-content-between">
                                    <small class="opacity-50 me-auto">Илья Чубаров</small>
                                    <p class="text-end mb-0">
                                        <a href="#"
                                            class="link-body-emphasis stretched-link link-icon-animation text-decoration-none">Перейти
                                            <x-icon path="bs.arrow-right" />
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    --}}
@endsection

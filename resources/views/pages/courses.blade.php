@extends('layout')
@section('title', 'Курсы')

@section('content')

    <x-header image="/img/sign.svg">
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

@endsection

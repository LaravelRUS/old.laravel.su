@extends('layout')
@section('title', 'Курсы')

@section('content')

    <x-header image="/img/sign.svg">
        <x-slot:sup>Всё наглядно</x-slot>
        <x-slot:title>Научитесь программировать</x-slot>

        <x-slot:description>
            Изучите широкий спектр навыков с помощью наших профессиональных руководств.
        </x-slot>
    </x-header>

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

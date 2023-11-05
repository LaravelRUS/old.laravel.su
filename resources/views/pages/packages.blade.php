@extends('layout')
@section('title', 'Пакеты')

@section('content')

    <div class="container py-5">

        <div class="bg-secondary-subtle p-5 rounded">
            <div class="row row-cols-lg-3 row-cols-md-6 row-cols-sm-12 align-items-center g-5">

                @foreach (range(0, 9) as $package)
                    <div class="col">
                        <div class="bg-body-tertiary p-5 rounded h-100 position-relative text-wrap text-break">

                            <div class="row justify-content-between mb-4">
                                <div class="col">
                                    <span class="badge bg-warning text-dark rounded-1">
                                        Лучшая админка
                                    </span>
                                </div>

                                <div class="col-auto text-warning d-inline-flex align-items-center me-auto">
                                    <x-icon path="bs.star" class="me-2" />
                                    2324
                                </div>
                            </div>

                            <p class="fs-4">
                                Orchid
                            </p>

                            <hr class="w-25">

                            <p>
                                Мощное и простое в использовании решение для создания административных панелей и
                                бизнес-приложений
                                {{ \Illuminate\Support\Str::random(100) }}
                            </p>
                            <p class="text-end mb-0">
                                <a href="#"
                                    class="link-body-emphasis stretched-link link-icon-animation text-decoration-none">Перейти
                                    <x-icon path="bs.arrow-right" />
                                </a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

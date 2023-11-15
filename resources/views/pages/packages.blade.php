@extends('layout')
@section('title', 'Пакеты')

@section('content')

    <div class="container py-5">

        <div class="bg-body-secondary p-5 rounded">
            <div class="row row-cols-lg-3 row-cols-md-6 row-cols-sm-12 align-items-center g-5">

                @foreach (range(0, 9) as $package)
                    <div class="col">
                        <div class="bg-body-tertiary p-5 rounded h-100 position-relative text-wrap text-break position-relative">

                            @if($loop->index === 9)
                                <span class="badge bg-warning text-dark rounded-end-3 position-absolute end-0 top-0">
                                    Лучшая админка
                                </span>
                            @endif

                            <p class="fs-4">
                                Orchid
                            </p>

                            <hr class="w-25">

                            <p class="line-clamp o-50 line-clamp-5 small">
                                Мощное и простое в использовании решение для создания административных панелей и
                                бизнес-приложений
                                {{ \Illuminate\Support\Str::random(100) }}
                            </p>


                            <div class="row justify-content-between">
                                <div class="col-auto d-inline-flex align-items-center me-auto">
                                    <x-icon path="bs.star-fill" class="me-2 text-warning" />
                                    2324
                                </div>
                                <div class="col">
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
    </div>

@endsection

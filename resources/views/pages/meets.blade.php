@extends('layout')
@section('title', 'Реклама')

@section('content')

    <div class="container py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <div class="bg-dark-subtle dashed p-4 rounded position-relative">
                    <a href="#" class="position-absolute start-0 end-0 top-0 bottom-0 z-1"></a>

                    <div class="row g-4 justify-content-between align-items-center">
                        <div class="col-sm-7">
                            <div class="row g-3">

                                <div class="col-12">
                                    <h4 class="mb-0">PHP Russia</h4>
                                </div>

                                <!-- Date -->
                                <div class="col-6">
                                    <small class="text-muted">Дата</small>
                                    <h6>11 Ноября</h6>
                                </div>
                                <!-- Time -->
                                <div class="col-6">
                                    <small class="text-muted">Время</small>
                                    <h6>Начало в 9 утра</h6>
                                </div>
                                <!-- Address -->
                                <div class="col-12">
                                    <small class="text-muted">Адрес</small>
                                    <h6>Москва, Крокус Сити Хол</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center">
                            <div class="ticket-border">
                                <!-- QR code -->
                                <img class="img-fluid mx-auto user-select-none" src="/img/qr-code.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Нельзя пропустить</span>
                <h1 class="display-5 fw-bold mb-4">Ни одна PHP конференция не обойдется без Laravel</h1>
                <p class="pe-5">
                    Рассказать, что Laravel на столько популярен в мире PHP что нет какой-либо конференции, где не спикеры
                    не упоминали Laravel
                </p>
            </div>
        </div>
    </div>

    <div class="container py-5">

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Прошедшие конференции</h5>
                <p class="mb-0">Чтобы вы не сожалели о пропущенных конференциях, мы оставили записи с этих событий.</p>
            </div>
            <div class="col-xl-8 text-center text-xl-start">
                <div class="bg-body-tertiary p-5 rounded-5 shadow mb-5">
                    <span class="opacity-50">Ульяновск, Главклуб</span>
                    <h5 class="my-3">Summer Merge</h5>
                    <p>
                        В этом году PHP Russia пройдет в рамках HighLoad++ 2022. 30 докладов, 2 круглых стола, ревью
                        резюме, unconference и митапы. Поговорим о тестировании, качестве, лучших практиках, архитектуре
                        и фреймворках, добавим хардкора.
                    </p>

                    <a href="#" class="btn btn-outline-primary">Как это было</a>
                </div>

                <div class="bg-body-tertiary p-5 rounded-5 shadow mb-5">
                    <span class="opacity-50">Ульяновск, Главклуб</span>
                    <h5 class="my-3">Summer Merge</h5>
                    <p>
                        В этом году PHP Russia пройдет в рамках HighLoad++ 2022. 30 докладов, 2 круглых стола, ревью
                        резюме, unconference и митапы. Поговорим о тестировании, качестве, лучших практиках, архитектуре
                        и фреймворках, добавим хардкора.
                    </p>

                    <a href="#" class="btn btn-outline-primary">Как это было</a>
                </div>

                <div class="bg-body-tertiary p-5 rounded-5 shadow mb-5">
                    <span class="opacity-50">Ульяновск, Главклуб</span>
                    <h5 class="my-3">Summer Merge</h5>
                    <p>
                        В этом году PHP Russia пройдет в рамках HighLoad++ 2022. 30 докладов, 2 круглых стола, ревью
                        резюме, unconference и митапы. Поговорим о тестировании, качестве, лучших практиках, архитектуре
                        и фреймворках, добавим хардкора.
                    </p>

                    <a href="#" class="btn btn-outline-primary">Как это было</a>
                </div>

                <div class="bg-body-tertiary p-5 rounded-5 shadow mb-5">
                    <span class="opacity-50">Ульяновск, Главклуб</span>
                    <h5 class="my-3">Summer Merge</h5>
                    <p>
                        В этом году PHP Russia пройдет в рамках HighLoad++ 2022. 30 докладов, 2 круглых стола, ревью
                        резюме, unconference и митапы. Поговорим о тестировании, качестве, лучших практиках, архитектуре
                        и фреймворках, добавим хардкора.
                    </p>

                    <a href="#" class="btn btn-outline-primary">Как это было</a>
                </div>
            </div>
        </div>

    </div>
@endsection

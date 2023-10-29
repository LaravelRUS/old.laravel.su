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
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Остаёмся на связи</span>
                <h1 class="display-5 fw-bold mb-4">Реклама</h1>
                <p class="pe-5">
                    Партнерство с Laravel Russian — это прекрасная возможность представить свой бренд тысячам разработчиков программного обеспечения.
                </p>
            </div>
        </div>
    </div>

@endsection

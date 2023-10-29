@extends('layout')
@section('title', 'Статус переводов')

@section('content')

    <div class="container py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="/img/sign.svg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                     height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Остаёмся на связи</span>
                <h1 class="display-5 fw-bold mb-4">Статус перевода Laravel 8.x</h1>
                <p class="pe-5">
                    Если вы хотите помочь с переводом документации — ознакомьтесь, пожалуйста с этой инструкцией.
                </p>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="col-xl-10 col-md-12 mx-auto">
            <div class="p-5 mb-4 bg-body-secondary rounded-3 position-relative">
                <div class="row row-cols-md-4 g-3">
                    @foreach(range(1, 20) as $version)
                        <div class="col">
                            <a href="#" class="{{ $version !== 8 ? 'link-body-emphasis' : 'link-primary' }} text-decoration-none">Laravel {{ $version }}.x</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row">
            <div class="col-xl-7 col-md-12 mx-auto">
                <div class="bg-white mb-4 p-5">

                    @foreach(range(1, 20) as $version)
                        <div class="position-relative">
                            <div class="d-flex align-items-start mb-4">
                                <h5 class="mb-0 me-auto">Laravel Cashier (Stripe)</h5>
                                <span class="badge bg-primary-subtle text-primary rounded rounded-1 fs-6 fw-normal">Перевод отстаёт на 2 изменения</span>
                            </div>

                            <div class="d-flex align-items-center mb-2">
                                <small class="opacity-50 me-auto">Перевод ссылается:</small>
                                <span class="user-select-all me-2">8f0031b4ea65784d5786507f76fbf9843c0ea388</span>
                                <a href="#">
                                    <x-icon path="bs.clipboard"/>
                                </a>
                            </div>

                            <div class="d-flex align-items-center">
                                <small class="opacity-50 me-auto">Последний коммит:</small>
                                <span class="user-select-all me-2">8f0031b4ea65784d5786507f76fbf9843c0ea388</span>
                                <a href="#">
                                    <x-icon path="bs.clipboard"/>
                                </a>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <hr class="m-5">
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

    </div>

@endsection

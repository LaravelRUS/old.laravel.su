@extends('html')
@section('title', config('app.name'))

@section('body')

    <div class="d-flex min-vh-100 align-items-center">
        <div class="m-auto">
            <div class="container border-start rounded" style="max-width: 600px; border-left-width: 0.3em!important;">
                <div class="row justify-content-center mb-4">
                    <div class="col">
                        <div class="my-4">
                            <img src="{{ asset('https://laravel.su/images/logo.png') }}" alt="{{ config('app.name') }}" height="40px">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="">
                            <h1 class="display-5 fw-bold lh-1 mb-3">
                                Laravel Russia
                            </h1>

                            <p class="lead">
                                Лучший ресурс скоро откроется
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

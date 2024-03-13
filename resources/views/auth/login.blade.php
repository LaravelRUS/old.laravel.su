@extends('layout')
@section('title', 'Вход')

@section('content')

    <x-container>
        <div class="bg-body-tertiary mb-4 p-4 p-xl-5 rounded">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="d-flex flex-column align-items-md-start gap-4">
                        <h3 class="fw-bold text-body-emphasis text-balance">
                            Чтобы участвовать в сообществе, войдите в учетную запись.
                        </h3>

                        <a href="{{ route('auth.login') }}" name="button" type="submit"
                           class="d-flex d-md-inline-flex justify-content-center justify-content-md-start btn btn-lg btn-primary icon-link">
                            <x-icon path="bs.github" class="auth-google-icon"/>
                            <span class="auth-google-text">Войти через GitHub</span>
                        </a>

                        <div class="text-opacity-50 small col-lg-7">
                            Создавая учетную запись, вы соглашаетесь с <a href="{{ route('rules') }}">правилами</a>.
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <img src="/img/ui/login.svg" class="img-fluid">
                </div>
            </div>
        </div>
    </x-container>

@endsection

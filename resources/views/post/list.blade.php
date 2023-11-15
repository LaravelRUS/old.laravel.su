@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="col-xl-8 col-md-12 mx-auto">
            <div class="p-5 mb-4 bg-body-secondary rounded-3 position-relative">


                <div class="position-absolute d-none d-xxl-block bottom-0 end-0 m-4"><img src="/img/fire.svg"></div>
                <ul class="nav flex-column col-xxl-10">
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-body-emphasis">Соблюдение
                            принципов
                            SOLID при
                            работе с
                            фреймворком
                            Laravel</a>
                    </li>
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-body-emphasis">Как начать
                            работать с
                            очередями в
                            Laravel</a>
                    </li>
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-body-emphasis">Laravel и
                            ULID</a></li>
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-body-emphasis">Немецкая OBI подала иск к российской «ОБИ франчайзинговый центр» о запрете использования товарных знаков </a>
                    </li>
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-body-emphasis">Threads разрешила пользователям удалять аккаунты, не удаляя привязанный профиль в Instagram* </a>
                    </li>
                </ul>

                <a href="#" class="link-body-emphasis text-decoration-none fw-bolder">Показать ещё</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <turbo-frame id="posts-frame" target="_top" src="{{ route('posts') }}"/>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="col-xl-8 col-md-12 mx-auto">
            <div class="p-5 mb-4 bg-body-secondary rounded-3 position-relative"
                 style="background-image: url('/img/fire.svg'); background-repeat: no-repeat; background-position: right bottom">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-dark">Соблюдение
                            принципов
                            SOLID при
                            работе с
                            фреймворком
                            Laravel</a>
                    </li>
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-dark">Как начать
                            работать с
                            очередями в
                            Laravel</a>
                    </li>
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-dark">Laravel и
                            ULID</a></li>
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-dark">Eloquent и
                            Blade: советы
                            по повышению
                            производительности</a>
                    </li>
                    <li class="nav-item mb-3"><a href="{{ route('post') }}" class="nav-link p-0 link-dark">About</a>
                    </li>
                </ul>

                <a href="#" class="link-dark text-decoration-none">Показать ещё</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <turbo-frame id="posts-frame" target="_top" src="{{ route('feed.articles') }}"/>
        </div>
    </div>
@endsection

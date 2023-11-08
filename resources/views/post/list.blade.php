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
            <x-stream target="posts" action="append" class="col-xl-8 col-md-12 mx-auto">
                @foreach ($posts as $post)
                    <div class="bg-body-tertiary mb-4 px-5 py-4">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <a href="{{ route('post.show', $post) }}">
                                        <img class="avatar-img rounded-circle" src="{{ $post->user->avatar }}"
                                            alt="{{ $post->user->title }}">
                                    </a>
                                </div>

                                <div class="small">
                                    <h6 class="mb-0 me-4">
                                        <a href="#!" class="text-body-secondary text-decoration-none">{{ $post->user->name }}</a>
                                    </h6>
                                    <p class="mb-0 small">Разработчик laravel.su</p>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <x-icon path="bs.three-dots" />
                                </a>
                            </div>
                        </div>

                        <div class="position-relative">
                            <a href="{{ route('post.show', $post) }}" class="position-absolute start-0 end-0 top-0 bottom-0"></a>

                            <h4 class="mb-3">{{ $post->title }}</h4>

                            <p>{{ $post->preview() }} </p>
                        </div>

                        <div class="d-flex align-items-center mt-4">

                            <a class="d-flex align-items-center text-body-secondary text-decoration-none me-4"
                                href="#!">
                                <x-icon path="bs.heart"/>
                                <span class="ms-2">~56</span>
                            </a>

                            <a class="d-flex align-items-center text-body-secondary text-decoration-none" href="#!">
                                <x-icon path="bs.chat"/>
                                <span class="ms-2">{{ $post->comments_count }}</span>
                            </a>

                            <span
                                class="text-body-secondary ms-auto user-select-none small">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </x-stream>

            <x-stream target="more" class="text-center">
                @if ($posts->hasMorePages())
                    <form action="{{ $posts->nextPageUrl() }}" method="post">
                        <button class="btn btn-primary">Загрузить больше</button>
                    </form>
                @endif
            </x-stream>
        </div>
    </div>
@endsection

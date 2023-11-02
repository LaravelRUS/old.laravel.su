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
            {{--
            <x-stream target="posts" action="append" class="col-xl-8 col-md-12 mx-auto">
                @foreach($posts as $post)
                    <div class="bg-body-tertiary mb-4 px-5 py-4">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <a href="#!">
                                        <img class="avatar-img rounded-circle"
                                             src="{{ $post->user->avatar }}"
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
                                <a href="#" class="text-secondary btn btn-link py-1 px-2"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    <x-icon path="bs.three-dots"/>
                                </a>
                            </div>
                        </div>

                        <div class="position-relative">
                            <a href="{{ route('post') }}"
                               class="position-absolute start-0 end-0 top-0 bottom-0"></a>


                            <h4 class="mb-3">{{$post->title}}</h4>

                            <p>{{$post->preview()}} </p>

                            <!-- Card img -->
                            <img class="card-img"
                                 src="https://uploads.tickettailor.com/c_crop,dpr_1.0,h_635,q_100,w_2000,x_0,y_75/c_scale,g_center,h_204,q_85,w_640/v1/production/userfiles/ls82tsupch7otycjjngi.jpg?_a=BAAARODQ"
                                 alt="Post">
                        </div>


                        <div class="d-flex align-items-center mt-4">

                            <a class="d-flex align-items-center text-body-secondary text-decoration-none me-4"
                               href="#!">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                     class="bi bi-heart"
                                     viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                                <span class="ms-2">56</span>
                            </a>

                            <a class="d-flex align-items-center text-body-secondary text-decoration-none" href="#!">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                     class="bi bi-chat"
                                     viewBox="0 0 16 16">
                                    <path
                                        d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                </svg>
                                <span class="ms-2">131</span>
                            </a>

                            <span
                                class="text-body-secondary ms-auto user-select-none small">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </x-stream>


            <x-stream target="more" class="text-center">
                @if($posts->hasMorePages())
                    <form
                        action="{{ $posts->nextPageUrl() }}"
                        method="post">
                        <button class="btn btn-primary">Загрузить больше</button>
                    </form>
                @endif
            </x-stream>
            --}}
            <div class="col-xl-8 col-md-12 mx-auto">
                @fragment('posts')
                <turbo-frame id="post-page-{{$posts->currentPage()}}" target="_top">
                    @foreach($posts as $post)
                        <div class="bg-body-tertiary mb-4 px-5 py-4">

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        <a href="#!">
                                            <img class="avatar-img rounded-circle"
                                                 src="{{ $post->user->avatar }}"
                                                 alt="{{ $post->user->title }}">
                                        </a>
                                    </div>

                                    <div class="small">
                                        <h6 class="mb-0 me-4">
                                            <a href="#!"
                                               class="text-body-secondary text-decoration-none">{{ $post->user->name }}</a>
                                        </h6>
                                        <p class="mb-0 small">Разработчик laravel.su</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="text-secondary btn btn-link py-1 px-2"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <x-icon path="bs.three-dots"/>
                                    </a>
                                </div>
                            </div>

                            <div class="position-relative">
                                <a href="{{ route('post') }}"
                                   class="position-absolute start-0 end-0 top-0 bottom-0"></a>


                                <h4 class="mb-3">{{$post->title}}</h4>

                                <p>{{$post->preview()}} </p>

                                <!-- Card img -->
                                <img class="card-img"
                                     src="https://uploads.tickettailor.com/c_crop,dpr_1.0,h_635,q_100,w_2000,x_0,y_75/c_scale,g_center,h_204,q_85,w_640/v1/production/userfiles/ls82tsupch7otycjjngi.jpg?_a=BAAARODQ"
                                     alt="Post">
                            </div>


                            <div class="d-flex align-items-center mt-4">

                                <a class="d-flex align-items-center text-body-secondary text-decoration-none me-4"
                                   href="#!">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                         class="bi bi-heart"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                    <span class="ms-2">56</span>
                                </a>

                                <a class="d-flex align-items-center text-body-secondary text-decoration-none" href="#!">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                         class="bi bi-chat"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                    </svg>
                                    <span class="ms-2">131</span>
                                </a>

                                <span
                                    class="text-body-secondary ms-auto user-select-none small">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                    @if($posts->hasMorePages())
                        <turbo-frame id="post-page-{{$posts->currentPage() +1}}"
                                     src="{{route('feed.more',['page'=>$posts->currentPage() +1])}}"
                                     loading="lazy"
                                     target="_top"
                        ></turbo-frame>
                    @endif
                </turbo-frame>

                @endfragment
            </div>
        </div>
    </div>

@endsection

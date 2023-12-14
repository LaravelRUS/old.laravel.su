@extends('layout')
@section('title', $post->title)


@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <main class="post">
                        {{--
                        <a class="text-decoration-none" href="#">Hotwire</a>
                        --}}
                        <h1>{{ $post->title }}</h1>

                        {!! \Illuminate\Support\Str::of($post->content)->markdown() !!}
                    </main>

                    <!-- Start Author  -->
                    <div class="d-flex align-items-center justify-content-between mt-5 p-4 bg-body-secondary rounded-3">
                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-sm me-3">
                                <a href="#!"> <img class="avatar-img rounded-circle"
                                        src="{{ $post->author->avatar }}" alt="">
                                </a>
                            </div>

                            <div class="small">
                                <h6 class="mb-0 me-4">
                                    <a href="#!" class="text-body-secondary text-decoration-none">{{ $post->author->name }}</a>
                                </h6>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <x-icon path="bs.three-dots"/>
                            </a>
                            <ul class="dropdown-menu">
                                @can('isOwner', $post)
                                    <li>
                                        <a class="dropdown-item" href="{{route('post.edit', $post)}}">Редактировать</a>
                                    </li>
                                    {{--
                                    у нас сейчас предусотрено только удатение статьи из списка,
                                    надо или убрать это, или делать отдельный метод с редиректом после удаления статьи
                                    <li>
                                        <a class="dropdown-item" data-turbo-method="delete"
                                           data-turbo-confirm="Вы уверены, что хотите удалить статью?"
                                           href="{{route('post.delete', $post)}}">Удалить</a>
                                    </li>
                                    --}}
                                @endcan
                                <li>
                                    <button class="dropdown-item"
                                            data-controller="share"
                                            data-share-title-value="{{$post->title}}"
                                            data-share-url-value="{{ route('post.show', $post) }}"
                                            data-action="click->share#dialog"
                                    >Поделиться</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Author  -->


                    <div class="d-flex align-items-center mt-4">
                        <x-like :model="$post"/>

                        <a class="d-flex align-items-center text-body-secondary text-decoration-none me-4"
                           href="{{ route('post.show', $post) }}">
                            <x-icon path="bs.chat"/>
                            <span class="ms-2">{{ $post->comments_count }}</span>
                        </a>

                        <span class="d-flex align-items-center text-body-secondary text-decoration-none">
                            <x-icon path="bs.clock"/>
                            <span class="ms-2">{{ $post->estimatedReadingTime() }} мин</span>
                        </span>

                        <time
                            data-controller="tooltip"
                            title="Опубликовано {{ $post->created_at->format('d.m.Y H:i') }}"
                            class="text-body-secondary ms-auto user-select-none small"
                            datetime="{{ $post->created_at->toISOString() }}">{{ $post->created_at->diffForHumans() }}</time>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <turbo-frame id="comments-frame" src="{{ route('post.comments', $post) }}" loading="lazy" target="_top">
        <div class="container my-5">
            <div class="row">
                <div class="col-xxl-8 mx-auto">
                    <p class="h5 mb-3 ms-3">
                        <span class="placeholder rounded col-3"></span>
                    </p>
                </div>

                <div class="bg-body-tertiary shadow-sm p-4 p-xl-5 rounded">
                    <div class="row mb-4">
                        <div class="col-12 col-xxl-8 mx-auto">
                            <div class="d-flex align-content-between align-items-stretch">
                                <div class="col-1 me-3">
                                    <span class="placeholder avatar-img rounded-circle w-100 p-3">
                                    </span>
                                </div>

                                <div class="w-100">
                                    <p class="card-text placeholder-glow mb-2">
                                        <span class="placeholder rounded col-4"></span>
                                    </p>
                                    <p class="card-text placeholder-glow small">
                                        <span class="placeholder rounded col-7"></span>
                                        <span class="placeholder rounded col-4"></span>
                                        <span class="placeholder rounded col-4"></span>
                                        <span class="placeholder rounded col-6"></span>
                                        <span class="placeholder rounded col-8"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xxl-8 mx-auto">
                            <div class="d-flex align-content-between align-items-stretch">
                                <div class="col-1 me-3">
                                    <span class="placeholder avatar-img rounded-circle w-100 p-3">
                                    </span>
                                </div>

                                <div class="w-100">
                                    <p class="card-text placeholder-glow mb-2">
                                        <span class="placeholder rounded col-2"></span>
                                    </p>
                                    <p class="card-text placeholder-glow small">
                                        <span class="placeholder rounded col-3"></span>
                                        <span class="placeholder rounded col-5"></span>
                                        <span class="placeholder rounded col-2"></span>
                                        <span class="placeholder rounded col-7"></span>
                                        <span class="placeholder rounded col-2"></span>
                                        <span class="placeholder rounded col-4"></span>
                                        <span class="placeholder rounded col-2"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </turbo-frame>
@endsection

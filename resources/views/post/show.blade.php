@extends('layout')
@section('type', "Трибуна")
@section('title', $post->title)


@section('content')
<x-container>
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
                <div class="col-xxl-8 mx-auto">

                    <main class="post" data-controller="prism">
                        {{--
                        <a class="text-decoration-none" href="#">Hotwire</a>
                        --}}
                        <h1>{{ $post->title }}</h1>

                        <x-posts.content :content="$post->content"/>
                    </main>

                    <!-- Start Author  -->
                    <div class="d-flex align-items-center justify-content-between mt-5 p-4 bg-body-secondary rounded-3 position-relative">
                        <figure class="position-absolute top-0 end-0 translate-middle z-n1">
                            <x-icon path="l.cube" width="46" height="53" fill="none"/>
                        </figure>

                        <x-profile :user="$post->author"/>


                        <div class="btn-group" role="group" aria-label="Basic example">
                            <x-device phone="true" tablet="true">
                                <button class=" btn btn-secondary"
                                        data-controller="share"
                                        data-share-title-value="{{$post->title}}"
                                        data-share-url-value="{{ route('post.show', $post) }}"
                                        data-action="click->share#dialog"
                                        title="Поделиться"
                                >
                                    <x-icon path="bs.share-fill"/>
                                </button>
                            </x-device>

                            <x-device desktop="true">
                                <button class="btn btn-secondary clipboard" data-controller="clipboard"
                                        data-action="clipboard#copy"
                                        data-clipboard-done-class="done">
                                        <span class="d-none" data-clipboard-target="source">{{ url()->current() }}</span>
                                        <x-icon path="i.copy" class="copy-action" data-controller="tooltip" title="Скопировать в буфер" />
                                        <x-icon path="i.copy-fill" class="copy-done" data-controller="tooltip" title="Скопировано" />
                                </button>
                            </x-device>

                            @can('update', $post)
                                <a class="btn btn-secondary" href="{{route('post.edit', $post)}}" title="Редактировать">
                                    <x-icon path="i.edit"/>
                                </a>
                            @endcan
                        </div>
                    </div>
                    <!-- End Author  -->


                    <div class="d-flex align-items-center mt-4">
                        <x-like :model="$post"/>

                        <a class="d-flex align-items-center text-body-secondary text-decoration-none me-4"
                           href="{{ route('post.show', $post) }}">
                            <x-icon path="i.comment"/>
                            <span class="ms-2">{{ $post->comments_count }}</span>
                        </a>

                        {{--
                        <span class="d-flex align-items-center text-body-secondary text-decoration-none ms-auto">
                            <x-icon path="bs.clock"/>
                            <span class="ms-2">{{ $post->estimatedReadingTime() }} мин</span>
                        </span>
                        --}}

                        <time
                            data-controller="tooltip"
                            title="Опубликовано {{ $post->created_at->format('d.m.Y H:i') }}"
                            class="text-body-secondary ms-auto user-select-none small"
                            datetime="{{ $post->created_at->toISOString() }}">{{ $post->created_at->diffForHumans() }}</time>
                    </div>
                </div>
            </div>
        </div>
</x-container>

{{--
<x-container>
    <div class="col-xl-8 col-md-12 mx-auto">
        <div class="p-4 p-xxl-5 bg-body-secondary rounded position-relative">
            <p class="body-emphasis text-decoration-none fw-bolder">Примените талант</p>

            <div class="position-absolute d-none d-xxl-block bottom-0 end-0 m-4"><img src="/img/ui/job.svg" width="200px" class="opacity-25"></div>
            <div class="flex-column col-xxl-10">
                @foreach(\App\Models\Position::limit(5)->get() as $position)
                    <div class="mb-3">
                        <a href="{{ route('position.show', $position) }}" class="nav-link p-0 link-body-emphasis align-items-baseline">
                            <span class="me-2">{{ $position->title }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('jobs') }}"
               data-turbo-method="post"
               class="link-body-emphasis text-decoration-none fw-bolder">Все вакансии</a>
        </div>
    </div>
</x-container>
--}}

@include('particles.positions')


<turbo-frame id="comments-frame" src="{{ route('post.comments', $post) }}" loading="lazy" target="_top">
    <x-container>
        <div class="row">
            <div class="col-xxl-8 mx-auto">
                <p class="h5 mb-3 ms-3">
                    <span class="placeholder rounded col-3"></span>
                </p>
            </div>

            <div class="bg-body-tertiary p-4 p-xl-5 rounded">
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
    </x-container>
</turbo-frame>

@include('particles.sponsors')

@endsection

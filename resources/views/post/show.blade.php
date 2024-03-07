@extends('layout')
@section('title', $post->title)
@section('description', $post->description)

@section('content')

<x-container>
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1 position-relative">

                <button type="button"
                        data-controller="history"
                        data-history-url-value="{{route('feed')}}"
                        data-action="click->history#back"
                        class="position-absolute top-0 end-0 m-4 btn btn-link link-secondary text-decoration-none fs-3 d-none d-md-inline">
                    <x-icon path="bs.x-lg"/>
                </button>

                <div class="col-lg-8 mx-auto">

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
                                    <x-icon path="i.share"/>
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

@include('particles.positions')

<turbo-frame id="comments-frame" src="{{ route('post.comments', $post) }}" loading="lazy" target="_top">
    <x-container>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <p class="h5 mb-3 ms-3">
                    <span class="placeholder rounded col-3"></span>
                </p>
            </div>

            <div class="bg-body-tertiary p-4 p-xl-5 rounded">
                <div class="row mb-4">
                    <div class="col-12 col-lg-8 mx-auto">
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
                    <div class="col-12 col-lg-8 mx-auto">
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

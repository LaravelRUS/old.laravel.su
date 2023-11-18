@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="col-xl-8 col-md-12 mx-auto">
            <div class="p-5 mb-4 bg-body-secondary rounded-3 position-relative">
                <div class="position-absolute d-none d-xxl-block bottom-0 end-0 m-4"><img src="/img/fire.svg"></div>
                <ul class="nav flex-column col-xxl-10">

                    @foreach($popular as $post)
                        <li class="nav-item mb-3">
                            <a href="{{ route('post.show', $post) }}" class="nav-link p-0 link-body-emphasis align-items-baseline">
                                <span class="me-2">{{ $post->title }}</span>

                                <small class="d-inline-flex align-items-center opacity-50">
                                    <x-icon path="bs.chat"/>
                                    <span class="ms-2">{{ $post->comments_count }}</span>
                                </small>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <a href="#" class="link-body-emphasis text-decoration-none fw-bolder">Показать ещё</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <turbo-frame id="posts-frame" target="_top" src="{{ route('posts') }}">
                @foreach(range(0,2) as $placeholder)
                    <div class="col-xl-8 col-md-12 mx-auto hotwire-frame">
                    <div class="bg-body-tertiary mb-4 px-5 py-4 rounded">

                        <span class="placeholder rounded col-6 mb-4"></span>

                        <span class="placeholder rounded col-7"></span>
                        <span class="placeholder rounded col-4"></span>
                        <span class="placeholder rounded col-4"></span>
                        <span class="placeholder rounded col-6"></span>
                        <span class="placeholder rounded col-8"></span>

                        <div class="d-flex mt-4">
                            <span class="placeholder rounded col-2 me-2"></span>
                            <span class="placeholder rounded col-2 me-2"></span>
                            <span class="placeholder rounded col-2 me-2"></span>
                            <span class="placeholder rounded col-2 ms-auto"></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </turbo-frame>
        </div>
    </div>
@endsection

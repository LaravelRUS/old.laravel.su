@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <div class="post">
                        <a class="text-decoration-none" href="#">Hotwire</a>

                        <h1>{{ $post->title }}</h1>

                        {!! $post->content !!}
                    </div>

                    <!-- Start Author  -->
                    <div class="d-flex align-items-center justify-content-between px-5 mx-3 mt-3">
                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-sm me-3">
                                <a href="#!"> <img class="avatar-img rounded-circle"
                                        src="https://xsgames.co/randomusers/avatar.php?g=male&amp;12" alt="">
                                </a>
                            </div>

                            <div class="small">
                                <h6 class="mb-0 me-4">
                                    <a href="#!" class="text-body-secondary text-decoration-none">Иван Сорокин</a>
                                </h6>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- End Author  -->
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="col-xxl-8 mx-auto">
            <p class="h5 mt-5 mb-3 ms-3">{{ $post->comments()->count() }} комментариев</p>
        </div>

        <div class="bg-body-tertiary shadow-sm p-5 rounded">
            <div class="row">
                <div class="col-12 col-xxl-8 mx-auto">
                    <x-comments :model="$post"/>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('profile.base')

@section('tab')

    <div class="col-xl-8 col-md-12 mx-auto">
        <div class="bg-body-tertiary rounded overflow-hidden my-5 px-5 py-4 position-relative">
            <div class="row align-items-center">
                <div class="col-xxl-auto">
                    <div class="avatar avatar-sm">
                        <img class="avatar-img rounded-circle" src="{{ $user->avatar }}"
                             alt="{{ $user->title }}">
                    </div>
                </div>

                <div class="col mx-auto">
                    <p class="opacity-50 mb-0">Новая запись</p>
                </div>

                <div class="col-xxl-auto">
                    <a href="{{ route('post.create') }}" class="btn btn-outline-primary stretched-link">Новая запись</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-8 col-md-12 mx-auto">
        @include('particles.posts.list')
        {{ $posts->links() }}
    </div>
@endsection

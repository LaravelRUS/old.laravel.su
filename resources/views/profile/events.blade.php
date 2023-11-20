@extends('profile.base')

@section('tab')
    <div class="col-xl-8 col-md-12 mx-auto">
        @include('particles.posts.list')
        {{ $posts->links() }}
    </div>
@endsection

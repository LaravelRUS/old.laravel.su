@extends('profile.base')

@section('tab')

    <div class="col-xl-8 col-md-12 mx-auto">
        <x-new-item :user="$user" :link="route('post.create')"/>
    </div>


    <div class="col-xl-8 col-md-12 mx-auto">
        @include('post.list')
        {{ $posts->links() }}
    </div>
@endsection

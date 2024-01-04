@section('title', "Трибуна")
@extends('layout')

@section('content')
   <x-container>
        <div class="col-xl-8 col-md-12 mx-auto">
            <div class="p-4 p-xxl-5 bg-body-secondary rounded position-relative">
                <div class="position-absolute d-none d-xxl-block bottom-0 end-0 m-4"><img src="/img/ui/popular-fire.svg"></div>
                <div id="popular-list" class="flex-column col-xxl-10">
                    @include('post._popular_list')
                </div>
                @include('post._popular_pagination')
            </div>
        </div>
   </x-container>

   <x-container>
        <div class="row">
            <div class="col-xl-8 col-md-12 mx-auto hotwire-frame">
                <turbo-frame id="posts-frame"
                             target="_top"
                             autoscroll="nearest"
                             data-autoscroll-block="nearest"
                             data-autoscroll-behavior="smooth">
                    @include('post.list')
                </turbo-frame>

                @include('post.pagination')
            </div>
        </div>
   </x-container>
@endsection

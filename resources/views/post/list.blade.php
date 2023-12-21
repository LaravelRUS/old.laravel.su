@extends('layout')

@section('content')
   <x-container>
        <div class="col-xl-8 col-md-12 mx-auto">
            <div class="p-4 p-xxl-5 bg-body-secondary rounded-3 position-relative">
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
                <turbo-frame id="posts-frame" target="_top" src="{{ route('posts') }}">
                    @foreach(range(0,2) as $placeholder)
                        <div class="bg-body-tertiary mb-4 p-xl-5 p-4 rounded post-placeholder">

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
                    @endforeach
                </turbo-frame>


                <div id="post-more"></div>
            </div>
        </div>
   </x-container>
@endsection

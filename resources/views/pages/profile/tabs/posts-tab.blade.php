
@extends('pages.profile.tabs.base')

@section('tab')
    <div class="col-xl-8 col-md-12 mx-auto">
        <turbo-frame id="posts-frame" target="_top" src="{{ route('posts', ['user_id'=>$user->id]) }}">
            @foreach(range(0,2) as $placeholder)
                <div class="bg-body-tertiary mb-4 px-5 py-4 rounded post-placeholder">

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
@endsection

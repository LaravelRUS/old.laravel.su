@section('title', "Трибуна")
@extends('layout')

@section('content')
   <x-container>
        <div class="col-xl-8 col-md-12 mx-auto">
            <div class="p-4 p-xl-5 bg-body-secondary rounded position-relative">
                <div class="position-absolute d-none d-xxl-block bottom-0 end-0 m-4"><img src="/img/ui/popular-fire.svg"></div>
                <div id="popular-list" class="flex-column col-xxl-10">
                    @include('post._popular_list')
                </div>
                @include('post._popular_pagination')
            </div>
        </div>
   </x-container>


   @empty(!$most)
   <x-container>
       <div class="row">
           <div class="col-xl-8 col-md-12 mx-auto hotwire-frame">
               <div class="d-flex flex-md-row flex-column px-4 px-xl-5 py-3 py-xl-4 bg-body-secondary rounded position-relative align-items-md-center">
                   <div class="vr bg-primary position-absolute start-0 opacity-100" style="top: 1.5em; bottom: 1.5em;"></div>
                    <x-icon path="i.tickets" width="2em" height="2em" class="d-none d-md-inline-block"/>

                   <div class="ms-md-4 mt-3 mt-md-0 col-md-6">
                       <div class="d-flex align-items-center mb-3 mb-md-0">
                            <x-icon path="i.tickets" width="2em" height="2em" class="d-md-none d-inline-block me-3"/>
                           <h5 class="mb-0"><a href="{{ $most->link }}" class="link-body-emphasis stretched-link text-decoration-none">{{ $most->name }}</a></h5>
                       </div>
                       <time class="small">{{ $most->start_date->isoFormat('DD MMMM', 'Do MMMM') }}, начало в {{ $most->start_date->isoFormat('HH:mm', 'Do MMMM') }}</time>
                       <small class="opacity-50 d-block">{{ $most->location }}</small>
                   </div>

                   <div class="ms-auto d-none d-md-block">
                       <a href="{{ $most->link }}" class="link-body-emphasis stretched-link text-decoration-none icon-link icon-link-hover">
                           Принять участие
                           <x-icon path="i.arrow-right" class="bi"/>
                       </a>
                   </div>
               </div>
           </div>
       </div>
   </x-container>
   @endempty


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

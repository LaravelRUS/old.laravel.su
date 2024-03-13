@extends('layout')
@section('type', "Работа")
@section('title', $position->title)


@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <main class="post" data-controller="prism">

                        <div class="row mb-4 mb-xl-5">
                            <div class="col-12 col-lg-8">
                                <h1 class="mb-0">{{ $position->title }}</h1>
                            </div>

                            <div class="col-12 col-lg-4 text-lg-end">
                                <div class="fw-bold fs-5">
                                    {{ $position->presenter()->salary() }}
                                </div>
                                <div class="small opacity-50">{{$position->schedule->text()}}</div>
                                <div class="small opacity-50">{{$position->organization}}</div>

                                @if($position->location)
                                    <span class="opacity-50 d-inline-flex align-items-center mb-3">
                                        <x-icon path="i.geo" class="me-2"/>
                                        {{$position->location}}
                                    </span>
                                @endif
                            </div>
                        </div>


                        {!! \Illuminate\Support\Str::of($position->description)->markdown() !!}


                        <details>
                            <summary class="d-block d-md-inline-block btn btn-primary me-3">Показать контакты</summary>

                            <span class="user-select-all">{{ $position->contact }}</span>
                        </details>

                    </main>


                    <!-- Start Author  -->
                    <div class="d-flex align-items-center justify-content-between mt-5 p-4 bg-body-secondary rounded-3 position-relative">
                        <figure class="position-absolute top-0 end-0 translate-middle z-n1">
                            <x-icon path="l.cube" width="46" height="53" fill="none"/>
                        </figure>

                        <x-profile :user="$position->author"/>


                        <div class="btn-group" role="group" aria-label="Basic example">
                            <x-device phone="true" tablet="true">
                                <button class="btn btn-secondary"
                                        data-controller="share"
                                        data-share-title-value="{{$position->title}}"
                                        data-share-url-value="{{ route('position.show', $position) }}"
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
                            @can('update', $position)
                                <a class="btn btn-secondary" href="{{route('position.edit', $position)}}" title="Редактировать">
                                    <x-icon path="i.edit"/>
                                </a>
                            @endcan
                        </div>
                    </div>
                    <!-- End Author  -->

                    <div class="d-flex align-items-center mt-4">
                        <time
                            data-controller="tooltip"
                            title="Опубликовано {{ $position->created_at->format('d.m.Y H:i') }}"
                            class="text-body-secondary ms-auto user-select-none small"
                            datetime="{{ $position->created_at->toISOString() }}">{{ $position->created_at->diffForHumans() }}</time>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-container>
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1 d-none d-lg-block">
                <h4 class="mb-4">Пакеты</h4>
                <turbo-frame id="latest-positions" src="{{route('packages.latest')}}" loading="lazy" target="_top">
                    <div class="row">
                        @foreach(range(0,2) as $placeholder)
                            <div class="col-4 position-relative">
                                <div class="bg-body-secondary p-4 rounded w-100">
                                    <p class="card-text placeholder-glow mb-2">
                                        <span class="placeholder rounded col-6"></span>
                                        <span class="placeholder rounded col-6"></span>
                                        <span class="placeholder rounded col-12"></span>
                                        <span class="placeholder rounded col-8"></span>
                                        <span class="placeholder rounded col-6"></span>
                                        <span class="placeholder rounded col-9"></span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </turbo-frame>
            </div>
        </div>

    </x-container>

@endsection

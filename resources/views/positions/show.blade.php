@extends('layout')
@section('title', $position->title)


@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <main class="post">

                        <div class="row mb-4 mb-xl-5">
                            <div class="col-12 col-lg-8">
                                <h1 class="mb-0">{{ $position->title }}</h1>
                            </div>

                            <div class="col-12 col-lg-4 text-lg-end">
                                <div class="fw-bold fs-5">
                                    @if(is_null($position->salary_min) && is_null($position->salary_max))
                                        не указана
                                    @endif
                                    @if (!is_null($position->salary_min) && !is_null($position->salary_max))
                                        От {{ $position->salary_min }} - до {{ $position->salary_max }} ₽
                                    @elseif (!is_null($position->salary_min))
                                                                    от {{ $position->salary_min }} ₽
                                    @elseif (!is_null($position->salary_max))
                                                                    до {{ $position->salary_max }} ₽
                                    @endif
                                </div>
                                <div class="small opacity-50">{{$position->schedule->text()}}</div>
                                <div class="small opacity-50">{{$position->organization}}</div>
                                <span class="opacity-50 d-inline-flex align-items-center mb-3">
                                    <x-icon path="bs.geo-alt-fill" class="me-2"/>
                                    {{$position->location}}
                                  </span>
                            </div>
                        </div>


                        {!! \Illuminate\Support\Str::of($position->description)->markdown() !!}


                        <details>
                            <summary class="btn btn-primary me-3">Показать контакты</summary>

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
                            <button class="btn btn-secondary"
                                    data-controller="share"
                                    data-share-title-value="{{$position->title}}"
                                    data-share-url-value="{{ route('position.show', $position) }}"
                                    data-action="click->share#dialog"
                                    title="Поделиться"
                            >
                                <x-icon path="bs.share-fill"/>
                            </button>
                            @can('isOwner', $position)
                                <a class="btn btn-secondary" href="{{route('position.edit', $position)}}" title="Редактировать">
                                    <x-icon path="bs.pencil-square"/>
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

@endsection

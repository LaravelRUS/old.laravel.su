@extends('layout')
@section('title', $position->title)


@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <main >


                        <h1>{{ $position->title }}</h1>
                        <p class="mb-2">
                            <span class="text-muted">Организация:</span>
                            {{$position->organization}}
                        </p>
                        <span class="text-muted d-flex align-items-center mb-3">
                                <x-icon path="bs.geo-alt-fill" class="me-2"/>
                                {{$position->address}}
                        </span>
                        <p class="mb-2">
                            <span class="text-muted">Зарплата:</span>
                            @if(is_null($position->salary_min) && is_null($position->salary_max)) не указана@endif
                            @if(!is_null($position->salary_min)) от {{ $position->salary_min }} @endif
                            @if(!is_null($position->salary_max)) до {{ $position->salary_max }}@endif
                        </p>
                        <p class="mb-2">
                            <span class="text-muted">Опыт работы:</span>
                            @if(!is_null($position->experience)) {{$position->experience}} @else не указан @endif
                        </p>

                        <p>{{$position->schedule->text()}}</p>


                        {!! \Illuminate\Support\Str::of($position->description)->markdown() !!}
                    </main>

                    <!-- Start Author  -->
                    <div class="d-flex align-items-center justify-content-end mt-5">
                        <div class="dropdown">
                            <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <x-icon path="bs.three-dots"/>
                            </a>
                            <ul class="dropdown-menu">
                                @can('isOwner', $position)
                                    <li>
                                        <a class="dropdown-item" href="{{route('position.edit', $position)}}">Редактировать</a>
                                    </li>
                                    {{--
                                    у нас сейчас предусотрено только удатение статьи из списка,
                                    надо или убрать это, или делать отдельный метод с редиректом после удаления статьи
                                    <li>
                                        <a class="dropdown-item" data-turbo-method="delete"
                                           data-turbo-confirm="Вы уверены, что хотите удалить статью?"
                                           href="{{route('post.delete', $post)}}">Удалить</a>
                                    </li>
                                    --}}
                                @endcan
                                <li>
                                    <button class="dropdown-item"
                                            data-controller="share"
                                            data-share-title-value="{{$position->title}}"
                                            data-share-url-value="{{ route('position.show', $position) }}"
                                            data-action="click->share#dialog"
                                    >Поделиться</button>
                                </li>
                            </ul>
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

@extends('layout')

@section('content')
    <x-container>
        <div class="col-xl-8 col-md-12 mx-auto">
            <div class="bg-body-tertiary rounded overflow-hidden mb-4">
                <!-- Cover image -->
                <div class="rounded-top d-flex"
                    style="height:200px;background-image:url(https://images.unsplash.com/photo-1698434156086-918aa526b531?auto=format&fit=crop&q=80&w=2340&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); background-position: center; background-size: cover; background-repeat: no-repeat;">

                    @if ($user->id === Auth::user()?->id)
                        <div class="d-flex mb-3 align-items-start p-4 ms-auto">
                            <a href="{{route('my.edit')}}" class="btn btn-primary me-2">
                                <x-icon path="bs.gear-fill"/>
                            </a>

                            <x-logout class="btn btn-secondary d-flex align-items-center fw-normal" formId="sign-out" title="Выйти">
                                <x-icon path="bs.box-arrow-right" class="me-2"/>
                                Выйти
                            </x-logout>
                        </div>
                    @endif
                </div>
                <!-- Card body START -->
                <div class="px-5">
                    <div class="d-sm-flex align-items-center text-center text-sm-start">
                        <div>
                            <!-- Avatar -->
                            <div class="avatar avatar-xxl mt-n5 mb-3 mx-auto">
                                <img class="avatar-img rounded border border-tertiary-subtle border-3"
                                    src="{{ $user->avatar }}" alt="">
                            </div>
                        </div>
                        <div class="ms-sm-4 mt-sm-3">
                            <h1 class="mb-0 h5 fw-bolder">
                                {{ $user->name }}
                            </h1>
                            <small class="opacity-75">Участник с {{ $user->created_at->isoFormat('MMMM YYYY', 'Do MMMM') }}</small>
                        </div>


                        {{--
                        <div class="d-flex flex-column my-3  ms-sm-auto">

                            @if ($user->id === Auth::user()?->id)
                                <div class="d-flex mb-3 align-items-start">
                                    <div class="d-inline-flex flex-column">
                                        <a href="{{ route('post.edit') }}" class="btn btn-primary d-inline-flex align-items-center">
                                            <x-icon path="bs.plus" class="pe-1"/>
                                            Создать запись
                                        </a>
                                    </div>
                                </div>
                            @else
                                <a href="https://github.com/{{$user->nickname}}" class="d-block">
                                    <x-icon path="bs.github" width="2em" height="2em"/>
                                </a>
                            @endif
                        </div>
                        --}}
                    </div>
                </div>

                <div class="nav nav-underline px-xxl-5 px-4">
                    <li class="nav-item me-2">
                        <a class="nav-link link-body-emphasis fw-normal {{ active('profile') }}"
                           data-turbo-frame="navigation"
                           href="{{ route('profile', $user) }}"

                        >Статьи</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-body-emphasis fw-normal {{ active('profile.packages') }}"
                           data-turbo-frame="navigation"
                           href="{{ route('profile.packages', $user) }}"

                        >Пакеты</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-body-emphasis fw-normal {{ active('profile.comments') }}"
                           data-turbo-frame="navigation"
                           href="{{ route('profile.comments', $user) }}"

                        >Комментариии</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-body-emphasis fw-normal {{ active('profile.awards') }}"
                           href="{{ route('profile.awards', $user) }}"
                        >Награды</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-body-emphasis fw-normal {{ active('profile.meets') }}"
                           href="{{ route('profile.meets', $user) }}"
                        >События</a>
                    </li>
                </div>
            </div>
        </div>

        <div>
            @yield('tab')
        </div>
    </x-container>

@endsection

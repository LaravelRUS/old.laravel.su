@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="col-xl-8 col-md-12 mx-auto">
            <div class="bg-body-tertiary rounded overflow-hidden mb-4">
                <!-- Cover image -->
                <div class="rounded-top"
                    style="height:200px;background-image:url(https://images.unsplash.com/photo-1698434156086-918aa526b531?auto=format&fit=crop&q=80&w=2340&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); background-position: center; background-size: cover; background-repeat: no-repeat;">

                </div>
                <!-- Card body START -->
                <div class="px-5">
                    <div class="d-sm-flex align-items-start text-center text-sm-start">
                        <div>
                            <!-- Avatar -->
                            <div class="avatar avatar-xxl mt-n5 mb-3">
                                <img class="avatar-img rounded-circle border border-tertiary-subtle border-3"
                                    src="{{ $user->avatar }}" alt="">
                            </div>
                        </div>
                        <div class="ms-sm-4 mt-sm-3">

                            <h1 class="mb-0 h5">
                                {{ $user->name }}
                                <x-icon path="bs.patch-check-fill" class="text-primary" />
                            </h1>
                            <small class="opacity-75">На проекте с 23 мая 2022</small>
                        </div>

                        <div class="d-flex flex-column my-3  ms-sm-auto ">


                            @if ($isMyAccount)
                                <x-logout class="btn btn-link" formId="sign-out">
                                    <x-icon path="bs.logout" class="pe-1" />
                                    Выйти из профиля
                                </x-logout>
                                <a href="{{route('my.edit')}}" class="btn btn-danger">
                                    <x-icon path="bs.pencil-fill" class="pe-1"/>
                                    Редактировать
                                </a>
                            @else
                                <a href="https://github.com/{{$user->nickname}}" class="d-block mb-2">
                                    <x-icon path="bs.github" width="1.5em" height="1.5em" class="pe-1"/>
                                </a>


                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <turbo-frame id="tabs-frame" src="{{route('profile.posts',$user)}}" target="_top"/>
    </div>

@endsection

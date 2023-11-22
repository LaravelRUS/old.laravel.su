@extends('layout')

@section('content')
    <x-stream target="profile" >
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
                                <img class="avatar-img rounded border border-tertiary-subtle border-3"
                                     src="{{ $user->avatar }}" alt="">
                            </div>
                        </div>
                        <div class="ms-sm-4 mt-sm-3 flex-grow-1">
                            <form action="{{ route('my.update') }}" method="post">
                                <label for="name" class="form-label">Имя</label>
                                <input class="form-control mb-5" type="text" value="{{ old('name', $user->name) }}"
                                       id="name" name="name">
                                <x-error field="name" class="invalid-feedback d-block"/>

                                <label for="about" class="form-label ">О себе</label>

                                <div class="mb-5">
                                    <textarea
                                        data-controller="textarea-autogrow"
                                        data-textarea-autogrow-resize-debounce-delay-value="500"
                                        rows="6"
                                        id="about"
                                        name="about"
                                        class="form-control p-5">{{ old('about', $user->about) }}</textarea>
                                    <x-error field="about" class="invalid-feedback d-block mt-3"/>
                                </div>

                                <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    </x-stream>
@endsection

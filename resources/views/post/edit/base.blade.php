@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-xxl-5 p-4 rounded">
                <div class="col-xxl-8 mx-auto">

                    {{--
                    <div class="post">
                        <h1>{{ $title }}</h1>
                    </div>
                    --}}

                    <div class="d-flex position-relative overflow-hidden mb-2">
                        <div class="avatar avatar-sm me-3">
                            <img class="avatar-img rounded-circle"
                                 src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
                        </div>

                        <div class="d-sm-flex flex-column text-sm-start mb-3">
                                <h6 class="mb-0 h5 fw-bolder">{{ auth()->user()->name }}</h6>
                                <form action="{{route('post.edit')}}" method="post">
                                    <select id="select_type" name="select_type"
                                            class="form-select form-select-sm p-0 pe-3 border-0 bg-body-tertiary"
                                            style="outline: none!important;"
                                            onchange="this.form.requestSubmit()"
                                            @disabled($isEditing)
                                    >
                                        @foreach(\App\Casts\PostTypeEnum::cases() as $type)
                                            <option value="{{$type->value}}" @selected($post->type  == $type)>{{$type->value}}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                    </div>

                    <x-stream target="post-edit-forms">
                        @yield('form')
                    </x-stream>
                </div>
            </div>
        </div>
    </div>
@endsection

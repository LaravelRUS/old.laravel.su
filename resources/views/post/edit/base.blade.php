@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <div class="post">
                        <h1>{{ $title }}</h1>
                    </div>
                    <x-stream target="post-edit-forms">
                        <form action="{{route('post.edit')}}" method="post">
                            <select id="select_type" name="select_type" class="form-select "
                                    onchange="this.form.requestSubmit()"
                                    @disabled($isEditing)
                            >
                                @foreach(\App\Casts\PostTypeEnum::cases() as $type)
                                    <option value="{{$type->value}}" @selected($post->type  == $type)>{{$type->value}}</option>
                                @endforeach
                            </select>
                        </form>
                        @yield('form')
                    </x-stream>

                </div>
            </div>
        </div>
    </div>
@endsection

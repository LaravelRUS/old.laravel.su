@extends('layout')

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <div class="post">
                        <h1>{{$title}}</h1>
                    </div>
                    <form action="{{route('post.update',$post)}}"
                            method="post">
                        @csrf
                        <label for="title" class="form-label">Заголовок</label>
                        <input class="form-control mb-5"
                               type="text"
                               value="{{ old('title', $post->title) }}"
                               id="title"
                               name="title">

                        <label for="content" class="form-label"
                        >Контент</label>

                        <textarea
                            id="content"
                            name="content"
                            class="form-control mb-5">{{ old('content', $post->content) }}</textarea>

                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <div class="post">
                        <h1>{{ $title }}</h1>
                    </div>
                    <form action="{{ route('post.update', $post) }}" method="post">
                        @csrf


                        <div class="bg-secondary-subtle">
                        <input class="form-control border-0 p-5 pb-0 rounded-0" type="text" value="{{ old('title', $post->title) }}"
                            id="title" name="title" placeholder="Заголовок" style="font-weight: 600;font-size: 2em;">

                        <textarea id="content" name="content" placeholder="Контент" rows="10" class="form-control mb-5 border-0 p-5 rounded-0">{{ old('content', $post->content) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

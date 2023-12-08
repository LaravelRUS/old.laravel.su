@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-xxl-5 p-4 rounded">
                <div class="col-xxl-8 mx-auto">

                    <div class="d-flex position-relative align-items-center overflow-hidden mb-2">
                        <div class="avatar avatar-sm me-3">
                            <img class="avatar-img rounded-circle"
                                 src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
                        </div>


                        <h6 class="mb-0 h5 fw-bolder">{{ auth()->user()->name }}</h6>

                    </div>

                    <form action="{{ $post->exists? route('post.update', $post) : route('post.store') }}" method="post">

                    <textarea data-controller="textarea-autogrow"
                              data-textarea-autogrow-resize-debounce-delay-value="500"
                              id="title" name="title"
                              placeholder="Заголовок" rows="1"
                              class="w-100 py-3 form-editor form-editor-title">{{ old('title', $post->title) }}</textarea>

                        <x-text-editor name="content" id="content" placeholder="Текст публикации"
                                       :value="old('content', $post->content)"/>

                        <button type="submit" class="btn btn-primary">Опубликовать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

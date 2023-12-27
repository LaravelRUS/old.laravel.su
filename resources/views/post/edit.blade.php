@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-xxl-5 p-4 rounded">
                <div class="col-xxl-8 mx-auto">

                    <x-profile :user="auth()->user()" class="mb-3"/>


                    <form action="{{ $post->exists ? route('post.update', $post) : route('post.store') }}" method="post">

                    <textarea data-controller="textarea-autogrow"
                              data-textarea-autogrow-resize-debounce-delay-value="500"
                              id="title" name="title"
                              placeholder="Заголовок"
                              required
                              rows="1"
                              class="w-100 py-3 form-editor form-editor-title">{{ old('title', $post->title) }}</textarea>

                        <x-text-editor name="content" id="content" placeholder="Текст публикации"
                                       :value="old('content', $post->content)"/>

                        <div class="mt-3 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary">
                                {{ $post->exists ? "Обновить" : "Опубликовать" }}
                            </button>

                            @if($post->exists)
                                <a class="btn btn-link ms-auto icon-link text-decoration-none" data-turbo-method="delete"
                                   data-turbo-confirm="Вы уверены, что хотите удалить запись?"
                                   href="{{route('post.delete', $post)}}">
                                    <x-icon path="bs.trash3" />
                                    Удалить
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

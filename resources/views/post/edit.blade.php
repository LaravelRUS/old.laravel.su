@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded">
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

                        <div class="mt-3 d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
                            <button type="submit" class="btn btn-primary mb-3 mb-md-0">
                                {{ $post->exists ? "Обновить" : "Опубликовать" }}
                            </button>

                            @if($post->exists)
                                <a class="justify-content-center justify-content-md-start btn btn-link ms-md-auto icon-link text-decoration-none" data-turbo-method="delete"
                                   data-turbo-confirm="Вы уверены, что хотите удалить публикацию?"
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

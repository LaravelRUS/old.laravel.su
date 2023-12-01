@extends('post.edit.base')

@section('form')


    <form action="{{ $post->exists? route('post.update', $post) : route('post.store') }}" method="post">

        <textarea data-controller="textarea-autogrow"
                  data-textarea-autogrow-resize-debounce-delay-value="500"
                  id="title" name="title"
                  placeholder="Заголовок" rows="1"
                  class="w-100 py-3 form-editor form-editor-title">{{ old('title', $post->title) }}</textarea>

        <x-text-editor name="content" id="content" placeholder="Текст публикации" :value="old('content', $post->content)"/>

        @if(!$isEditing)
            <input type="hidden" name="type" id="type" value="{{$post->type->value}}">
        @endif

        <button type="submit" class="btn btn-primary">Опубликовать</button>
    </form>

@endsection

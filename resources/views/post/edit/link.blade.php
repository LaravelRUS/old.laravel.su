@extends('post.edit.base')

@section('form')

    {{-- текст для проверки переключения типов, т.к. сейчас в шаблонах формы одинаковые --}}
    ссылка
    <form action="{{ route('post.update', $post) }}" method="post">

        <div class="bg-secondary-subtle">
            <textarea data-controller="textarea-autogrow"
                      data-textarea-autogrow-resize-debounce-delay-value="0"
                      id="title" name="title"
                      placeholder="Заголовок" rows="1"
                      class="form-control border-start-0 border-end-0 border-top-0 px-5 py-4 rounded-0">{{ old('title', $post->title) }}</textarea>

            <textarea data-controller="textarea-autogrow"
                      data-textarea-autogrow-resize-debounce-delay-value="500" id="content"
                      name="content" placeholder="Контент" rows="10"
                      class="form-control mb-5 border-0 p-5 rounded-0">{{ old('content', $post->content) }}</textarea>
        </div>
        @if(!$isEditing)
            <input type="hidden" name="type" id="type" value="{{$post->type->value}}">
        @endif

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

@endsection

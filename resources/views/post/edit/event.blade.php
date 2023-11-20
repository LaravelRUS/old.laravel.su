@extends('post.edit.base')

@section('form')

    {{-- текст для проверки переключения типов, т.к. сейчас в шаблонах формы одинаковые --}}
    Событие
    <form action="{{ route('post.update', $post) }}" method="post">


                        <div class="bg-secondary-subtle">
                            <textarea data-controller="textarea-autogrow"
                                      data-textarea-autogrow-resize-debounce-delay-value="500"
                                      style="resize:none;font-weight: 600;font-size: 2em;" id="title" name="title"
                                      placeholder="Заголовок" rows="1"
                                      class="form-control border-start-0 border-end-0 border-top-0 px-5 py-4 rounded-0">{{ old('title', $post->title) }}</textarea>


                            <x-text-editor name="content" id="content" placeholder="Контент" :value="old('content', $post->content)"/>
                        </div>
                        @if(!$isEditing)
                            <input type="hidden" name="type" id="type" value="{{$post->type->value}}">
                       @endif

                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>

@endsection

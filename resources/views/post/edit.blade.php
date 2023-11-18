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
                        <div class="bg-secondary-subtle">
                            <textarea data-controller="textarea-autogrow"
                                      data-textarea-autogrow-resize-debounce-delay-value="500"
                                      style="resize:none;font-weight: 600;font-size: 2em;" id="title" name="title"
                                      placeholder="Заголовок" rows="1"
                                      class="form-control border-start-0 border-end-0 border-top-0 px-5 py-4 rounded-0">{{ old('title', $post->title) }}</textarea>

                            <textarea data-controller="textarea-autogrow"
                                      data-textarea-autogrow-resize-debounce-delay-value="500" id="content"
                                      name="content" placeholder="Контент" rows="10"
                                      class="form-control mb-5 border-0 p-5 rounded-0">{{ old('content', $post->content) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

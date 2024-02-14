@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <form method="post">
                        <div
                            data-controller="tabs"
                            data-tabs-active-tab-class="bg-body-secondary"
                            data-tabs-index-value="0"
                        >

                            <div class="row gy-3">
                                <div class="col-12 col-md-7">
                                    <x-profile :user="auth()->user()" class="mb-3"/>
                                </div>

                                <div class="col-12 col-md-5">
                                    <div class="d-flex align-items-baseline align-content-between justify-content-center">
                                        <a href="#" class="btn btn-link text-decoration-none link-body-emphasis"
                                           id="edit"
                                           data-tabs-target="tab" data-action="click->tabs#change:prevent">
                                            Редактирование
                                        </a>

                                        <button
                                            id="preview"
                                            data-tabs-target="tab"
                                            data-action="click->tabs#change"
                                            type="submit"
                                            formaction="{{  route('post.preview') }}"
                                            class="btn btn-link text-decoration-none  link-body-emphasis"
                                        >
                                            Предпросмотр
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="">
                                <div data-tabs-target="panel">
                                <textarea data-controller="textarea-autogrow"
                                          data-textarea-autogrow-resize-debounce-delay-value="500"
                                          id="title" name="title"
                                          placeholder="Заголовок"
                                          required
                                          rows="1"
                                          class="w-100 py-3 form-editor form-editor-title text-balance">{{ old('title', $post->title) }}</textarea>
                                    <x-text-editor name="content" id="content" placeholder="Текст публикации"
                                                   :value="old('content', $post->content)"/>
                                </div>
                                <div class="d-none" data-tabs-target="panel">
                                    <main class="post" id="post-preview"></main>
                                </div>
                            </div>


                            <div
                                class="mt-3 gap-3 d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
                                <button
                                    formaction="{{ $post->exists ? route('post.update', $post) : route('post.store') }}"
                                    type="submit"
                                    class="btn btn-primary mb-3 mb-md-0">
                                    {{ $post->exists ? "Обновить" : "Опубликовать" }}
                                </button>

                                @if($post->exists)
                                    <a class="justify-content-center justify-content-md-start btn btn-link ms-md-auto icon-link text-decoration-none"
                                       data-turbo-method="delete"
                                       data-turbo-confirm="Вы уверены, что хотите удалить публикацию?"
                                       href="{{route('post.delete', $post)}}">
                                        <x-icon path="i.delete"/>
                                        Удалить
                                    </a>
                                @endif
                            </div>


                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

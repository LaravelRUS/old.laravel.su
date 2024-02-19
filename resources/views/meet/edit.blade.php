@extends('layout')

@section('content')
    <x-container>
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <x-profile :user="auth()->user()" class="mb-3"/>

                    <form action="{{ $meet->exists ? route('meets.update', $meet) : route('meets.store') }}"
                          method="post"
                          class="my-5">

                        <textarea data-controller="textarea-autogrow"
                                  data-textarea-autogrow-resize-debounce-delay-value="500"
                                  id="name" name="meet[name]"
                                  placeholder="Заголовок"
                                  required
                                  rows="1"
                                  class="w-100 py-3 form-editor form-editor-title text-balance">{{ old('meet.name', $meet->name) }}</textarea>

                        <div class="row row-cols-1 row-cols-md-2 mb-3">
                            <div class="col mb-3">
                                <label for="location" class="form-label">Адрес</label>
                                <input class="form-control mb-3 {{ $errors->has('meet.location') ? 'is-invalid' : '' }}"
                                       name="meet[location]" id="location" type="text"
                                       placeholder="Адрес"
                                       value="{{ old('meet.location', $meet->location) }}"/>
                                <x-error field="meet.location" class="invalid-feedback"/>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           value="1"
                                           name="meet[online]"
                                           @checked($meet->online)
                                           id="online">
                                    <label class="form-check-label" for="online">Онлайн</label>
                                    <x-error field="meet.online" class="invalid-feedback"/>
                                </div>
                                <div class="form-text">
                                    Если мероприятие проводится только онлайн, оставьте это поле пустым.
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for="link" class="form-label">Ссылка на сайт</label>
                                <input class="form-control mb-3 {{ $errors->has('meet.link') ? 'is-invalid' : '' }}"
                                       name="meet[link]" id="link" type="url"
                                       placeholder="Ссылка"
                                       value="{{ old('meet.link', $meet->link) }}"/>
                                <x-error field="meet.link" class="invalid-feedback"/>

                                <div class="form-text">
                                    Укажите ссылку на страницу с подробным описанием мероприятия
                                </div>

                            </div>
                            <div class="col mb-3">
                                <label for="start_date" class="form-label">Дата и время начала</label>
                                <input class="form-control mb-3" name="meet[start_date]" id="start_date"
                                       type="datetime-local"
                                       min="{{now()->format('Y-m-d\TH:m')}}"
                                       value="{{ old('meet.start_date', $meet->start_date) }}"
                                       placeholder="Начало"/>
                                <x-error field="meet.start_date" class="invalid-feedback my-3"/>
                            </div>




                        </div>

                        <x-text-editor name="meet[description]" id="description" placeholder="Добавьте краткое описание"
                                       :value="old('meet.description', $meet->description)"/>


                        <div class="mt-3 d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
                            <button type="submit" class="btn btn-primary mb-3 mb-md-0">
                                {{ $meet->exists ? "Обновить" : "Опубликовать" }}
                            </button>

                            @if($meet->exists)
                                <a class="justify-content-center justify-content-md-start btn btn-link ms-md-auto icon-link text-decoration-none" data-turbo-method="delete"
                                   data-turbo-confirm="Вы уверены, что хотите удалить публикацию?"
                                   href="{{route('meets.delete', $meet)}}">
                                    <x-icon path="i.delete" />
                                    Удалить
                                </a>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </x-container>
@endsection

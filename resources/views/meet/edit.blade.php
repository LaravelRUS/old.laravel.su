@extends('layout')

@section('content')
    <x-container>
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

                    <form action="{{ $meet->exists ? route('meets.update', $meet) : route('meets.create.save') }}"
                          method="post">

                        <textarea data-controller="textarea-autogrow"
                                  data-textarea-autogrow-resize-debounce-delay-value="500"
                                  id="name" name="meet[name]"
                                  placeholder="Заголовок" rows="1"
                                  class="w-100 py-3 form-editor form-editor-title">{{ old('meet.name', $meet->name) }}</textarea>

                        <input class="form-control mb-3" name="meet[start_date]" id="start_date" type="datetime-local"
                               min="{{now()->format('Y-m-d\TH:m')}}"
                                value="{{ old('meet.start_date', $meet->start_date) }}"
                               placeholder="Начало"/>
                        <x-error field="meet.start_date" class="invalid-feedback"/>

                        <input class="form-control mb-3" name="meet[address]" id="address" type="text"
                               placeholder="Адрес"
                               value="{{ old('meet.address', $meet->address) }}" />
                        <x-error field="meet.address" class="invalid-feedback"/>

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

                        <input class="form-control mb-3" name="meet[link]" id="link" type="url"
                               placeholder="Ссылка"
                               value="{{ old('meet.link', $meet->link) }}" />
                        <x-error field="meet.link" class="invalid-feedback"/>

                        <x-text-editor name="meet[description]" id="description" placeholder="Описание"
                                       :value="old('meet.description', $meet->description)"/>


                        <button type="submit" class="btn btn-primary">Опубликовать</button>
                    </form>

                </div>
            </div>
        </div>
    </x-container>
@endsection

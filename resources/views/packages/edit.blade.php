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

                    <form action="{{ $pack->exists? route('packages.update', $pack) : route('packages.store')}}"
                          method="post">

                        <textarea data-controller="textarea-autogrow"
                                  data-textarea-autogrow-resize-debounce-delay-value="500"
                                  id="name" name="pack[name]"
                                  placeholder="Заголовок" rows="1"
                                  class="w-100 py-3 form-editor form-editor-title">{{ old('pack.name', $pack->name) }}</textarea>


                        <input class="form-control mb-3" name="pack[packagist_name]" id="packagist_name" type="text"
                               placeholder="packagist_name"
                               value="{{ old('pack.packagist_name', $pack->packagist_name) }}" />
                        <x-error field="pack.packagist_name" class="invalid-feedback"/>



                        <input class="form-control mb-3" name="pack[website]" id="website" type="url"
                               placeholder="Сайт"
                               value="{{ old('pack.website', $pack->website) }}" />
                        <x-error field="pack.website" class="invalid-feedback"/>


                            <select id="type" name="pack[type]"
                                    class="form-select form-select-sm mb-3"
                                    style="outline: none!important;">
                                <optgroup label="Категория">

                                    @foreach(\App\Casts\PackageTypeEnum::cases() as $type)
                                        <option value="{{$type->value}}" @selected($pack->type  == $type)>{{$type->text()}}</option>
                                    @endforeach
                                </optgroup>
                            </select>


                        <x-text-editor name="pack[description]" id="description" placeholder="Описание"
                                       :value="old('pack.description', $pack->description)"/>


                        <button type="submit" class="btn btn-primary">Опубликовать</button>
                    </form>

                </div>
            </div>
        </div>
    </x-container>
@endsection

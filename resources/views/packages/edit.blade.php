@extends('layout')

@section('content')
    <x-container>
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <x-profile :user="auth()->user()" class="mb-3"/>

                    <form action="{{ $pack->exists? route('packages.update', $pack) : route('packages.store')}}"
                          method="post"
                          class="my-5">

                        <div class="row g-5">

                            <div class="col-12 col-lg-7">

                                <div class="mb-3">
                                    <label for="packagist_name" class="form-label">Основания для включения</label>
                                    <div class="form-text">
                                        <p>Мы не преследуем цели охватить все существующие пакеты, а хотим включить те,
                                           которые действительно полезны и активно поддерживаются.</p>
                                        <p>Количество звезд на GitHub не является основным фактором при принятии решения
                                           о
                                           включении пакета или нет. Мы обращаем внимание на различные аспекты, включая
                                           активность разработчиков, обратную связь сообщества и соответствие последним
                                           версиям Laravel и PHP.</p>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="packagist_name" class="form-label">Имя пакета</label>
                                    <input
                                        class="form-control mb-3 {{ $errors->has('packagist_name') ? 'is-invalid' : '' }}"
                                        name="packagist_name" id="packagist_name" type="text"
                                        placeholder="laravel-russia/docs"
                                        value="{{ old('packagist_name', $pack->packagist_name) }}"/>
                                    <x-error field="packagist_name" class="invalid-feedback my-3"/>

                                    <div class="form-text">
                                        Имя пакета которое зарегистрировано на <a href="https://packagist.org/">Packagist</a>,
                                        например <code>orchid/platform</code>, также используется в файле composer.json
                                        вашего проекта.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Укажите категорию</label>
                                    <select id="type" name="type"
                                            class="form-select mb-3">
                                        <optgroup label="Категория">
                                            @foreach(\App\Models\Enums\PackageTypeEnum::cases() as $type)
                                                <option
                                                    value="{{$type->value}}" @selected(old('type', $pack->type) == $type->value)>{{$type->text()}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>

                                    <div class="form-text">
                                        Выберите наиболее подходящую категорию для вашего пакета.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5 d-none d-lg-block">
                                <div class="bg-body rounded p-4">
                                    <small class="fw-bolder mb-3 d-block">Как выбрать подходящую категорию для вашего
                                                                          пакета?</small>

                                    <ul class="list-unstyled opacity-50 mb-0 small">
                                        <li class="mb-2">Изучите пакеты схожей функциональности и их выбранные категории.</li>
                                        <li class="mb-2">Выберите наиболее близкую категорию из имеющихся.</li>
                                        <li class="mb-0">Если точной категории нет, выберите более широкую.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
                            <button type="submit" class="btn btn-primary mb-3 mb-md-0">
                                {{ $pack->exists ? "Обновить" : "Опубликовать" }}
                            </button>

                            @if($pack->exists)
                                <a class="justify-content-center justify-content-md-start btn btn-link ms-md-auto icon-link text-decoration-none"
                                   data-turbo-method="delete"
                                   data-turbo-confirm="Вы уверены, что хотите удалить публикацию?"
                                   href="{{route('packages.delete', $pack)}}">
                                    <x-icon path="i.delete"/>
                                    Удалить
                                </a>
                            @endif
                        </div>

                        {{--
                        <input class="form-control mb-3" name="pack[website]" id="website" type="url"
                               placeholder="Сайт"
                               value="{{ old('pack.website', $pack->website) }}" />
                        <x-error field="website" class="invalid-feedback"/>
                        --}}
                    </form>

                </div>
            </div>
        </div>
    </x-container>
@endsection

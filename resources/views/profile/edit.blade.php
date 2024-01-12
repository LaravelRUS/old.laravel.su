@extends('layout')

@section('content')

    <x-container>
        <div class="col-xl-8 col-md-12 mx-auto">
            <div class="bg-body-tertiary rounded overflow-hidden mb-4">
                <!-- Cover image -->
                <div class="rounded-top"
                     style="height:200px;background-image:url(https://images.unsplash.com/photo-1698434156086-918aa526b531?auto=format&fit=crop&q=80&w=2340&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); background-position: center; background-size: cover; background-repeat: no-repeat;">
                </div>
                <!-- Card body START -->
                <div class="px-5">
                    <div class="d-sm-flex align-items-start">
                        <div>
                            <!-- Avatar -->
                            <div class="avatar avatar-xxl mt-n5 mb-3 mx-auto mx-lg-0">
                                <img class="avatar-img rounded border border-tertiary-subtle border-3"
                                     src="{{ $user->avatar }}" alt="">
                            </div>

                            <p class="small opacity-50 text-balance">Ваш аватар автоматически загружается при входе в профиль из
                                                        вашего аккаунта на <a href="https://github.com" target="_blank">GitHub</a>.
                            </p>
                        </div>
                        <div class="ms-sm-4 mt-sm-4 flex-grow-1">
                            <form action="{{ route('my.update') }}" method="post">


                                <div class="mb-4">
                                    <label for="name" class="form-label">Имя</label>
                                    <input class="form-control" type="text" value="{{ old('name', $user->name) }}"
                                           id="name" name="name">
                                    <x-error field="name" class="invalid-feedback d-block"/>
                                    <div class="form-text mt-2">Использование настоящего имени помогает установить личное
                                                           взаимодействие и создать доверительную обстановку в
                                                           профессиональной среде.
                                    </div>
                                </div>


                                <div class="mb-4">
                                    <label for="about" class="form-label ">О себе</label>
                                    <textarea
                                        data-controller="textarea-autogrow"
                                        data-textarea-autogrow-resize-debounce-delay-value="500"
                                        rows="6"
                                        id="about"
                                        name="about"
                                        class="form-control">{{ old('about', $user->about) }}</textarea>
                                    <x-error field="about" class="invalid-feedback d-block mt-3"/>

                                    <div class="form-text mt-2">
                                    Расскажите немного о себе, своем опыте работы.
                                    Будет замечательно, если вы поделитесь своими проектами или достижениями, связанными
                                    с разработкой на Laravel.
                                    </div>
                                </div>


                                <div class="mb-4">
                                    <label for="theme-checker-auto" class="form-label d-block">Оформление</label>

                                    <div data-controller="theme" data-action="change->theme#toggleTheme" data-turbo-permanent
                                         class="btn-group mb-3" role="group" aria-label="Тема оформления" id="theme-checker-group-user-settings">
                                        <input type="radio" value="auto" data-theme-target="preferred" class="btn-check"
                                               name="theme-checker" id="theme-checker-auto" autocomplete="off" checked>
                                        <label class="btn btn-outline-secondary" for="theme-checker-auto">
                                            <x-icon path="bs.circle-half"/>
                                        </label>

                                        <input type="radio" value="light" data-theme-target="preferred" class="btn-check"
                                               name="theme-checker" id="theme-checker-light" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="theme-checker-light">
                                            <x-icon path="bs.sun-fill"/>
                                        </label>

                                        <input type="radio" value="dark" data-theme-target="preferred" class="btn-check"
                                               name="theme-checker" id="theme-checker-dark" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="theme-checker-dark">
                                            <x-icon path="bs.moon-stars-fill"/>
                                        </label>
                                    </div>

                                    <div class="form-text">
                                        Выберите тему, которая наиболее подходит вашим предпочтениям, или настройте
                                        автоматическое переключение между дневной и ночной темами, чтобы интерфейс
                                        адаптировался автоматически в соответствии с вашей системой.
                                    </div>
                                </div>
                                <div class="d-flex d-md-inline-block">
                                    <button type="submit" class="btn btn-primary mb-3 w-100">Сохранить</button>
                                </div>


                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </x-container>

@endsection

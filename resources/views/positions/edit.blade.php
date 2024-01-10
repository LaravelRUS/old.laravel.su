@extends('layout')

@section('content')
    <x-container>
        <div class="row">
            <div class="bg-body-tertiary p-xxl-5 p-4 rounded">
                <div class="col-xxl-8 mx-auto">

                    <x-profile :user="auth()->user()" class="mb-3"/>

                    <form action="{{ $position->exists? route('position.update', $position) : route('position.store')}}"
                          method="post">

                        <textarea data-controller="textarea-autogrow"
                                  data-textarea-autogrow-resize-debounce-delay-value="500"
                                  id="title" name="position[title]"
                                  placeholder="Название вакансии"
                                  required
                                  rows="1"
                                  class="w-100 py-3 form-editor form-editor-title">{{ old('position.title', $position->title) }}</textarea>

                        <x-text-editor name="position[description]" id="description"
                                       placeholder="Делайте вакансию максимально подробной! Чем больше информации, тем легче кандидату решиться и связаться с вами. Не стесняйтесь сообщать все важные детали."
                                       :value="old('position.description', $position->description)"/>
                        <x-error field="position.description" class="invalid-feedback"/>


                        <div class="row row-cols-1 row-cols-md-2 mb-3">
                            <div class="col mb-3">
                                <div class="bg-body-secondary rounded p-4">
                                    <div class="form-text">
                                        <p>Укажите название компании, так, как оно известно в сети (например,
                                           М.Видео). Это поможет кандидатам получить более полное представление о вашей компании.
                                        </p>
                                        <p class="mb-0">Если ваша компания только начинает свой путь, укажите название сайта, например laravel.su,
                                           вместо формализма "ООО Рога и Копыта".</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for="organization"
                                       class="form-label">Организация</label>
                                <input class="form-control mb-3" name="position[organization]" id="organization"
                                       type="text"
                                       placeholder="Название"
                                       required
                                       value="{{ old('position.organization', $position->organization) }}"/>
                                <x-error field="position.organization" class="invalid-feedback"/>

                                <div class="form-text">
                                    <p class="small">Некоторые примеры:</p>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><span class="me-2">✅</span>Пятёрочка</li>
                                        <li class="mb-2"><span class="me-2">✅</span>assisted-mindfulness.com</li>
                                        <li class="mb-2"><span class="me-2">❌</span>ООО Энд-Медиа</li>
                                        <li class=""><span class="me-2">❌</span>РемСезОблКон</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-1 row-cols-md-2 mb-3">
                            <div class="col mb-3">
                                <div class="bg-body-secondary rounded p-4">
                                    <div class="form-text">
                                        <p>
                                            Не все кандитаты готовы ездить на работу в офис по 2 часа в одну сторону.
                                            Укажите, где будет проходить основная работа, что бы кандидаты могли оценить
                                            расстояние.
                                        </p>
                                        <p class="mb-0">Если вакансия предполагает полностью удалённый формат работы, оставьте поле
                                           не заполненным.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">

                                <div class="mb-3">
                                    <label for="schedule"
                                           class="form-label">Формат</label>
                                    <select id="schedule" name="position[schedule]"
                                            class="form-select mb-3">
                                        @foreach(\App\Casts\ScheduleEnum::cases() as $schedule)
                                            <option
                                                value="{{$schedule->value}}" @selected($position->schedule  == $schedule)>
                                                {{$schedule->text()}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-error field="position.schedule" class="invalid-feedback"/>
                                </div>

                                <div class="mb-3">
                                    <label for="location"
                                           class="form-label">Локация</label>
                                    <input class="form-control mb-3" name="position[location]" id="location" type="text"
                                           placeholder="Название города или метро"
                                           required
                                           value="{{ old('position.location', $position->location) }}"/>
                                    <x-error field="position.location" class="invalid-feedback"/>

                                    <div class="form-text">
                                        <p class="small">Некоторые примеры:</p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><span class="me-2">✅</span>м. Красногвардейская</li>
                                            <li class="mb-2"><span class="me-2">✅</span>г. Липецк</li>
                                            <li class=""><span class="me-2">❌</span>г. Тула, Улица Пушкинская, 27
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row row-cols-1 row-cols-md-2 mb-3">
                            <div class="col mb-3">
                                <div class="bg-body-secondary rounded p-4">
                                    <div class="form-text">
                                        <p class="mb-0">
                                           Когда работодатель не указывает информацию о зарплате, потенциальный опытный кандитат
                                           с высокой долей вероятности будет считать её малооплачиваемой.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for="salary_min"
                                       class="form-label">Заработная плата</label>
                                <div class="col">
                                    <input class="form-control mb-3" name="position[salary_min]" id="salary_min"
                                           type="number"
                                           min="0"
                                           step="1000"
                                           placeholder="От"
                                           value="{{ old('position.salary_min', $position->salary_min) }}"/>
                                    <x-error field="position.salary_min" class="invalid-feedback"/>
                                </div>
                                <div class="col">
                                    <input class="form-control mb-3" name="position[salary_max]" id="salary_max"
                                           type="number"
                                           min="0"
                                           step="1000"
                                           placeholder="До"
                                           value="{{ old('position.salary_max', $position->salary_max) }}"/>
                                    <x-error field="position.salary_max" class="invalid-feedback"/>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="contact"
                                   class="form-label">Как связаться?</label>
                            <input class="form-control mb-3" name="position[contact]" id="contact"
                                   type="text"
                                   required
                                   placeholder="Например, telegram, почта или ссылка на сайт"
                                   value="{{ old('position.contact', $position->contact) }}"/>
                            <x-error field="position.contact" class="invalid-feedback"/>
                        </div>


                        <div class="mt-3 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary">
                                {{ $position->exists ? "Обновить" : "Опубликовать" }}
                            </button>

                            @if($position->exists)
                                <a class="btn btn-link ms-auto icon-link text-decoration-none" data-turbo-method="delete"
                                   data-turbo-confirm="Вы уверены, что хотите удалить вакансию?"
                                   href="{{route('position.delete', $position)}}">
                                    <x-icon path="bs.trash3" />
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

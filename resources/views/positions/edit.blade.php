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
                                  placeholder="Заголовок" rows="1"
                                  class="w-100 py-3 form-editor form-editor-title">{{ old('position.title', $position->title) }}</textarea>

                        <x-text-editor name="position[description]" id="description" placeholder="Описание"
                                       :value="old('position.description', $position->description)"/>
                        <x-error field="position.description" class="invalid-feedback"/>


                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                            <label for="organization"
                                   class="form-label">Организация</label>
                        <input class="form-control mb-3" name="position[organization]" id="organization" type="text"
                               placeholder="Организация"
                               required
                               value="{{ old('position.organization', $position->organization) }}"/>
                        <x-error field="position.organization" class="invalid-feedback"/>
                            </div>
                            <div class="col">
                        <label for="organization"
                               class="form-label">Адрес</label>
                        <input class="form-control mb-3" name="position[address]" id="address" type="text"
                               placeholder="Метро Краснозаводская"
                               required
                               value="{{ old('position.address', $position->address) }}"/>
                        <x-error field="position.address" class="invalid-feedback"/>
                            </div>
                        </div>

                        <label for="organization"
                               class="form-label">Зарплата</label>
                         <div class="row row-cols-1 row-cols-md-2">
                             <div class="col">
                                 <input class="form-control mb-3" name="position[salary_min]" id="salary_min"
                                        type="number"
                                        min="0"
                                        placeholder="От"
                                        value="{{ old('position.salary_min', $position->salary_min) }}"/>
                                 <x-error field="position.salary_min" class="invalid-feedback"/>
                             </div>
                             <div class="col">
                                 <input class="form-control mb-3" name="position[salary_max]" id="salary_max"
                                        type="number"
                                        min="0"
                                        placeholder="До"
                                        value="{{ old('position.salary_max', $position->salary_max) }}"/>
                                 <x-error field="position.salary_max" class="invalid-feedback"/>
                             </div>

                         </div>
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                                <label for="schedule"
                                       class="form-label">График</label>
                                <select id="schedule" name="position[schedule]"
                                        class="form-select mb-3"
                                        style="outline: none!important;">

                                        @foreach(\App\Casts\ScheduleEnum::cases() as $schedule)
                                            <option value="{{$schedule->value}}" @selected($position->schedule  == $schedule)>
                                                {{$schedule->text()}}
                                            </option>
                                        @endforeach
                                </select>
                                <x-error field="position.schedule" class="invalid-feedback"/>
                            </div>
                            <div class="col">
                                <label for="experience"
                                       class="form-label">Опыт</label>
                                <input class="form-control mb-3" name="position[experience]" id="experience"
                                       type="number"
                                       min="0"
                                       placeholder="от"
                                       value="{{ old('position.experience', $position->experience) }}"/>
                                <x-error field="position.experience" class="invalid-feedback"/>
                            </div>
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

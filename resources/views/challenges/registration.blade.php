@extends('layout')
@section('title', 'Принять участие в кодице')

@section('content')
    <x-container>
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <x-profile :user="auth()->user()" class="mb-3"/>

                    <form action="{{ route('challenges.registration.save')}}"
                          method="post"
                    class="my-5">

                        <div class="row g-5">

                            <div class="col-12 col-lg-7">

                                <div class="mb-3">
                                    <label for="packagist_name" class="form-label">Регистрация команды</label>
                                    <div class="form-text">
                                        <p>Кодица - это уникальное событие, которое объединяет талантливых
                                            разработчиков, программистов и креативных мыслителей. Это место,
                                            где идеи становятся реальностью, а коды превращаются в функциональные
                                            приложения. Но помимо этого, хакатон - это еще и невероятно весело!</p>
                                        <p>Независимо от уровня ваших навыков, вы можете принять участие в этих
                                            соревнованиях, чтобы ускорить обучение, навыки программирования и
                                            уверенность в себе.</p>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="url" class="form-label">Ссылка на репозиторий GitHub</label>
                                    <input class="form-control mb-3 {{ $errors->has('url') ? 'is-invalid' : '' }}" name="url" id="url" type="text"
                                           placeholder="laravel-russia/docs"
                                           value="{{ old('url', $repo->url) }}" />
                                    <x-error field="url" class="invalid-feedback my-3"/>

                                    <div class="form-text">
                                        Кодица - это уникальное событие, которое объединяет талантливых разработчиков,
                                        программистов и креативных мыслителей. Это место, где идеи становятся
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="count_participants" class="form-label">Количество участников</label>
                                    <input class="form-control mb-3 {{ $errors->has('url') ? 'is-invalid' : '' }}" name="count_participants" id="count_participants" type="text"

                                           value="{{ old('count_participants', $repo->count_participants) }}" />
                                    <x-error field="count_participants" class="invalid-feedback my-3"/>

                                    <div class="form-text">
                                        Кодица - это уникальное событие, которое объединяет талантливых разработчиков,
                                        программистов и креативных мыслителей. Это место, где идеи становятся
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5 d-none d-lg-block">
                                <div class="bg-body rounded p-4">
                                <small class="fw-bolder mb-3 d-block">Где можно найти соратников?</small>

                                <p>
                                    Кодица - это уникальное событие, которое объединяет талантливых разработчиков,
                                    программистов и креативных мыслителей. Это место, где идеи становятся реальностью,
                                    а коды превращаются в функциональные приложения. Но помимо этого, хакатон - это еще
                                    и невероятно весело!
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
                            <button type="submit" class="btn btn-primary mb-3 mb-md-0">
                                {{ $repo->exists ? "Обновить" : "Опубликовать" }}
                            </button>

                            @if($repo->exists)
                                <a class="justify-content-center justify-content-md-start btn btn-link ms-md-auto icon-link text-decoration-none" data-turbo-method="delete"
                                   data-turbo-confirm="Вы уверены, что хотите удалить публикацию?"
                                   href="{{route('packages.delete', $pack)}}">
                                    <x-icon path="i.delete" />
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

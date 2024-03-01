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
                                    <label for="packagist_name" class="form-label">Регистрация нового репозитория</label>
                                    <div class="form-text">
                                        <p>
                                            Для вашего участия в текущей Кодице, необходимо создать новый репозиторий на
                                            <a href="https://github.com/new" target="_blank">GitHub</a>, где вы будете
                                            вести разработку.
                                        </p>

                                        <p>
                                            Если вы разрабатываете не один, то каждому участнику не нужно создавать
                                            собственный репозиторий или регистрироваться! Мы будем отслеживаем авторов
                                            коммитов через API, по этому никого не потерям.
                                        </p>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="url" class="form-label">Имя репозитория</label>
                                    <input class="form-control mb-3 {{ $errors->has('github_repository') ? 'is-invalid' : '' }}"
                                           required
                                           name="github_repository"
                                           id="github_repository"
                                           type="text"
                                           title="Пожалуйста, введите название репозитория в формате 'username/repo'"
                                           placeholder="tabuna/breadcrumbs"
                                           value="{{ old('github_repository', $repo->github_repository) }}" />
                                    <x-error field="github_repository" class="invalid-feedback my-3"/>

                                    <div class="form-text">
                                        Этот репозиторий будет вашим центром разработки, где вы сможете создавать новый
                                        код и загружать изменения. Вы можете работать над проектом самостоятельно или
                                        пригласить коллег для совместной работы.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5 d-none d-lg-block">
                                <div class="bg-body rounded p-4">
                                <small class="fw-bolder mb-3 d-block">В поиске напарников?</small>

                                <p class="opacity-50 mb-0 small text-balance">
                                    Просто взгляните на комментарии под анонсом. Там вы найдете единомышленников,
                                    которые, как и вы, ищут напарника. Не стесняйтесь быть первым, кто начнет общение!
                                    Ведь вместе всегда веселее и продуктивнее.
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
                            <button type="submit" class="btn btn-primary mb-3 mb-md-0">Принять участие</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </x-container>
@endsection

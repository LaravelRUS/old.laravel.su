@extends('layout')
@section('title', 'Админ панель | Самое важное вместе с Orchid')

@section('content')

    <x-header image="/img/ui/orchid.svg">
        <x-slot:sup>Админ панель</x-slot>
        <x-slot:title>Самое важное вместе с Orchid</x-slot>

        <x-slot:description>
            Благодаря подходу, основанному на коде, вы можете быстро и легко создавать эффективные приложения.
        </x-slot>

        <x-slot:actions>
            <a href="{{ asset('https://orchid.software/ru/docs?utm_source=laravelsu&utm_medium=page&utm_campaign=friends') }}" class="btn btn-primary btn-lg px-4">Перейти на сайт</a>

            <a href="{{ asset('https://github.com/orchidsoftware') }}"
               class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">Репозиторий
                <x-icon path="i.arrow-right" class="bi" />
            </a>
        </x-slot>
    </x-header>



    <x-container>
        <div class="row g-4 g-xxl-5 g-lg-4 g-md-3">

            <div class="col-12 col-lg-8">
                <div class="bg-primary bg-opacity-10 p-4 p-xl-5 rounded position-relative h-100 overflow-hidden">


                    <div class="row h-100">

                        <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                            <div class="d-flex flex-column h-100">

                                <div class="mb-auto">
                                    <p class="h2 mb-3">Легкий старт</p>

                                    <p>
                                        Орхидея поставляется с необходимой технической документацией и примерами для
                                        быстрого и успешного внедрения.
                                    </p>

                                    <p>
                                    "Из коробки" доступен широкий выбор компонентов пользовательского
                                    интерфейса, включая формы ввода, диалоги и графику.
                                    </p>
                                </div>


                                <div class="mt-auto">

                                    <p class="opacity-50 mb-2 small">Некоторые компоненты:</p>

                                    <a href="{{ asset('https://orchid.software/ru/docs/field') }}"
                                       class="d-inline-flex link-body-emphasis text-decoration-none mb-1 icon-link icon-link-hover me-3">
                                        Элементы форм
                                        <x-icon path="i.arrow-right" class="bi" />
                                    </a>

                                    <a href="{{ asset('https://orchid.software/ru/docs/table') }}"
                                       class="d-inline-flex link-body-emphasis text-decoration-none mb-1 icon-link icon-link-hover me-3">
                                        Таблицы
                                        <x-icon path="i.arrow-right" class="bi" />
                                    </a>

                                    <a href="{{ asset('https://orchid.software/ru/docs/charts') }}"
                                       class="d-inline-flex link-body-emphasis text-decoration-none mb-1 icon-link icon-link-hover me-3">
                                        Графики
                                        <x-icon path="i.arrow-right" class="bi" />
                                    </a>

                                    <a href="{{ asset('https://orchid.software/ru/docs/modals') }}"
                                       class="d-inline-flex link-body-emphasis text-decoration-none mb-1 icon-link icon-link-hover me-3">
                                        Модальные окна
                                        <x-icon path="i.arrow-right" class="bi" />
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="d-none d-md-block col-md-4 col-lg-6 col-xl-6">
                            <img src="/img/ui/start.svg" class="img-fluid">
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="bg-secondary bg-opacity-10 p-4 p-xl-5 rounded position-relative h-100">

                    <div class="d-flex flex-column h-100">

                        <div class="mb-auto">
                            <p class="h2 mb-3">Разрешения</p>

                            <p>
                                Управляйте разрешениями пользователей и обеспечивайте безопасность приложений без особых усилий.
                            </p>
                        </div>


                        <div class="mt-auto d-flex flex-column align-items-center justify-content-between">
                            <img src="/img/ui/shield.svg" class="img-fluid package-cover mb-2">
                            <a href="{{ asset('https://orchid.software/ru/docs/access') }}"
                               class="d-inline-flex w-100 link-body-emphasis text-end text-decoration-none stretched-link icon-link icon-link-hover">
                                Узнать больше
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="bg-secondary bg-opacity-10 p-4 p-xl-5 rounded position-relative h-100">

                    <div class="d-flex flex-column h-100">

                        <div class="mb-auto">
                            <p class="h2 mb-3">Работа с файлами</p>

                            <p>
                                Просто добавляйте любой файл к записи с помощью гибкой функции вложения.
                            </p>
                        </div>


                        <div class="mt-auto d-flex flex-column align-items-center justify-content-between">
                            <img src="/img/ui/files.svg" class="img-fluid package-cover">

                            <a href="{{ asset('https://orchid.software/ru/docs/attachments') }}"
                               class="d-inline-flex w-100 link-body-emphasis text-end text-decoration-none stretched-link icon-link icon-link-hover">
                                Как работать с файлами
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="bg-secondary bg-opacity-10 p-4 p-xl-5 rounded position-relative h-100">

                    <div class="d-flex flex-column h-100">

                        <div class="mb-auto">
                            <p class="h2 mb-3">Руководство по дизайну</p>

                            <p>
                                Инвестиции в хороший UX увеличивают вовлеченность и предотвращают ошибки.
                            </p>
                        </div>


                        <div class="mt-auto d-flex flex-column align-items-center justify-content-between">
                            <img src="/img/ui/design.svg" class="img-fluid package-cover">
                            <a href="{{ asset('https://orchid.software/en/hig') }}"
                               class="d-inline-flex w-100 link-body-emphasis text-end text-decoration-none stretched-link icon-link icon-link-hover">
                                Прочитать
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="bg-secondary bg-opacity-10 p-4 p-xl-5 rounded position-relative h-100">
                    <div class="d-flex flex-column h-100">
                        <div class="mb-auto">
                            <p class="h2 mb-3">Пошаговые видео уроки</p>

                            <p>
                                В этой серии вы познакомитесь с множеством примеров, демонстрирующих,
                                как построить админ панель с готовым пользовательским интерфейсом.
                            </p>
                        </div>
                        <div class="mt-auto d-flex flex-column align-items-center justify-content-between">
                            <a href="{{ asset('https://www.youtube.com/playlist?list=PLM-y77GFP_D0ZtrNGXorSjlcO8KsFrcgJ') }}"
                               target="_blank"
                               class="d-inline-flex w-100 link-body-emphasis text-end text-decoration-none stretched-link icon-link icon-link-hover">
                                Построить админку
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </x-container>
@endsection

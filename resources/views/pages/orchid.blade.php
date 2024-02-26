@extends('layout')
@section('title', 'Улучшите навыки разработки смотря видео курсы')

@section('content')

    <x-header image="/img/ui/orchid.svg">
        <x-slot:sup>Админ панель</x-slot>
        <x-slot:title>Самое важное вместе с Orchid</x-slot>

        <x-slot:description>
            Благодаря подходу, основанному на коде, вы можете быстро и легко создавать эффективные приложения.
        </x-slot>

        <x-slot:actions>
            <a href="https//orchid.software/ru/docs" class="btn btn-primary btn-lg px-4">Перейти на сайт</a>

            <a href="{{ route('courses') }}"
               class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">Видео-урок
                <x-icon path="i.arrow-right" class="bi" />
            </a>
        </x-slot>
    </x-header>



    <x-container>
        <div class="row g-4 g-xxl-5 g-lg-4 g-md-3">




            <div class="col-12 col-xl-8">
                <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative h-100 overflow-hidden">


                    <div class="row h-100">

                        <div class="col-12 col-md-6">
                            <div class="d-flex flex-column h-100">

                                <div class="mb-auto">
                                    <p class="h2 mb-3">Легко начать</p>

                                    <p>
                                        Орхидеи поставляется с необходимой технической документацией и примерами для быстрого и успешного внедрения.
                                        Широким выбором компонентов пользовательского интерфейса, включая формы ввода, диалоги и графики.
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

                        <div class="d-none d-md-block col-md-6">
                            <img src="/img/ui/start.svg" class="img-fluid">
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative h-100">

                    <div class="d-flex flex-column h-100">

                        <div class="mb-auto">
                            <p class="h2 mb-3">Permissions</p>

                            <p>
                                Manage user permissions and ensure application security effortlessly.
                                Backed by an intuitive interface, it's easy to set up and manage roles, without complex coding or external plugins.
                            </p>
                        </div>


                        <div class="mt-auto">
                            <img src="/img/ui/shield.svg" class="img-fluid">
                            <a href="{{ asset('https://orchid.software/') }}"
                               class="d-none d-md-inline-flex link-body-emphasis text-end text-decoration-none stretched-link icon-link icon-link-hover">
                                Learn about Permissions
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12 col-lg-6 col-xl-4">
                <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative h-100">

                    <div class="d-flex flex-column h-100">

                        <div class="mb-auto">
                            <p class="h2 mb-3">Работа с файлами</p>

                            <p>
                                Просто добавляйте любой файл к записи с помощью гибкой функции вложения.
                                Организуйте важные данные и упростите рабочий процесс, прикрепляя файлы к любой модели в приложении.
                            </p>
                        </div>


                        <div class="mt-auto">
                            <img src="/img/ui/files.svg" class="img-fluid">

                            <a href="{{ asset('https://orchid.software/en/attachments') }}"
                               class="d-none d-md-inline-flex link-body-emphasis text-end text-decoration-none stretched-link icon-link icon-link-hover">
                                Как работать с файлами
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative h-100">

                    <div class="d-flex flex-column h-100">

                        <div class="mb-auto">
                            <p class="h2 mb-3">Руководство по дизайну</p>

                            <p>
                                Инвестиции в хороший UX увеличивают вовлеченность и предотвращают ошибки. Подробная
                                документация поможет создавать исключительные приложения.
                            </p>
                        </div>


                        <div class="mt-auto">
                            <img src="/img/ui/design.svg" class="img-fluid">
                            <a href="{{ asset('https://orchid.software/en/hig') }}"
                               class="d-none d-md-inline-flex link-body-emphasis text-end text-decoration-none stretched-link icon-link icon-link-hover">
                                Документация
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative h-100">
                    <div class="d-flex flex-column h-100">
                        <div class="mb-auto">
                            <p class="h2 mb-3">Никаких ограничений</p>

                            <p>
                                Полностью основывается на стандартах браузера и W3C, предоставляя возможности настройки для воплощения вашей идеи в жизнь.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </x-container>
@endsection

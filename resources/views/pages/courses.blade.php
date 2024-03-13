@extends('layout')
@section('title', 'Улучшите навыки разработки смотря видео курсы')

@section('content')

    <x-header image="/img/porridge.svg">
        <x-slot:sup>Всё наглядно</x-slot>
        <x-slot:title>Улучшите навыки смотря видео</x-slot>

        <x-slot:description>
            Тут собраны учебные материалы, которые помогут вам освоить фреймворк и разработку в целом.
        </x-slot>
    </x-header>



    <x-container>


        <div class="row g-4">
            <div class="col-md-4 mb-md-4">
                <div class="bg-secondary rounded bg-opacity-10 p-4 p-xl-5 position-relative overflow-hidden mb-4 h-100">
                    <h3 class="mb-3 fw-bold">Документация</h3>
                    <p class="mb-4 mb-md-auto fw-light line-clamp line-clamp-3">
                        Это ключ к полному пониманию, даже если применение еще не ясно.
                    </p>
                    <a href="{{ route('docs') }}"
                       class="link-body-emphasis text-decoration-none icon-link icon-link-hover stretched-link mt-4">
                        Начать читать
                        <x-icon path="i.arrow-right" class="bi" />
                    </a>
                </div>
            </div>

            <div class="col-md-8 mb-4">
                <div class="bg-primary bg-opacity-10 rounded p-4 p-xl-5 position-relative overflow-hidden mb-4  h-100">
                    <img src="/img/sign.svg" class="position-absolute w-50 bottom-0 end-0">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="mb-3 fw-bold">Laravel с нуля</h3>
                            <p class="mb-4 fw-light mb-md-auto h5 lead">
                                Твой путь к освоению мощного фреймворка с минимальными усилиями.
                            </p>
                            <a href="#" class="btn btn-primary mb-0 stretched-link mt-4 disabled" >В процессе создания {{-- Начать обучение--}}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="bg-primary bg-opacity-10 rounded p-4 p-xl-5 position-relative overflow-hidden h-100">
                    <div class="h-100 position-absolute w-50 bottom-0 end-0 z-n1 d-flex align-items-end justify-content-end justify-content-lg-center me-3 me-lg-0">
                        <img src="/img/ui/tentacle_cource.svg" class="package-cover tentacle">
                    </div>
                    <div class="h-100 d-flex flex-column">
                        <h3 class="mb-3 fw-bold">Orchid</h3>
                        <p class="mb-4 fw-light mb-md-auto line-clamp line-clamp-5">
                            В этой серии вы познакомитесь с множеством примеров, демонстрирующих,
                            как построить админ панель с готовым пользовательским интерфейсом.
                        </p>
                        <div class="row">
                            <div class="col-8 col-md-9 col-lg-12">

                                <a href="https://youtube.com/playlist?list=PLM-y77GFP_D0ZtrNGXorSjlcO8KsFrcgJ&si=KERSYOr8_2YvcPDV"
                                   target="_blank"
                                   class="btn btn-warning mb-0 stretched-link mt-4 w-100">Построить админку</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="bg-secondary rounded bg-opacity-10 p-4 p-xl-5 position-relative overflow-hidden h-100">
                    <div class="h-100 position-absolute w-50 bottom-0 end-0 z-n1 d-flex align-items-end  justify-content-end justify-content-lg-center me-3 me-lg-0" >
                        <img src="/img/ui/livewire_cource.svg" class="package-cover">
                    </div>
                    <div class="h-100 d-flex flex-column">
                        <h3 class="mb-3 fw-bold">Livewire</h3>
                        <p class="mb-4 mb-md-auto fw-light line-clamp line-clamp-5">
                            Создавайте динамические компоненты в PHP, и полностью игнорируйте уровень JavaScript.
                        </p>
                        <div class="row">
                            <div class="col-8 col-md-9 col-lg-12">
                                    <a href="https://www.youtube.com/playlist?list=PLM-y77GFP_D0Dan4oTbsseQGM6lFGbmUQ"
                                       target="_blank"
                                       class="btn  btn-primary mb-0 stretched-link stretched-link mt-4 w-100">Посмотреть курс</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="h-100 d-flex flex-column gap-4">
                    <div class="bg-secondary rounded bg-opacity-10 p-4 p-xl-5 position-relative overflow-hidden h-50">
                            <h3 class="mb-3 fw-bold">Очереди</h3>
                            <p class="mb-4 mb-md-auto fw-light line-clamp line-clamp-3">
                                Игнорирование <code>timeout</code>, дублирование задач и
                                сохранение состояния программы. Предоставляются практические примеры.
                            </p>
                            <a href="https://youtube.com/playlist?list=PLM-y77GFP_D04J1DYprCCashJQHxtJed4&si=SlSjGYJRLZ5jSeg5"
                               target="_blank"
                               class="link-body-emphasis text-decoration-none icon-link icon-link-hover stretched-link  mt-4">
                                Посмотреть курс
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>
                    </div>
                    <div class="bg-secondary rounded bg-opacity-10 p-4 p-xl-5 position-relative overflow-hidden h-50">
                            <h3 class="mb-3 fw-bold">PHP Итераторы</h3>
                            <p class="mb-4 mb-md-auto fw-light line-clamp line-clamp-3">
                                В этом видео курсе представлено введение в использование итераторов в PHP, включая
                                теорию, практические примеры и самостоятельное задание.
                            </p>
                            <a href="https://youtu.be/cPpEHTWDFv4?si=t3eB5KsYNQu99VpE"
                               target="_blank"
                               class="link-body-emphasis text-decoration-none icon-link icon-link-hover stretched-link mt-4">
                                Посмотреть видео
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4">

            <div class="col-md-8 mb-4">
                <div class="bg-primary bg-opacity-10 rounded p-4 p-xl-5 position-relative overflow-hidden mb-4  h-100">
                    <img src="/img/ui/book.svg" class="position-absolute w-50 bottom-0 end-0 z-n1 ps-xl-4">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3 class="mb-3 fw-bold text-balance">Архитектура сложных веб-приложений. <small class="small d-block">С примерами на Laravel.</small></h3>
                            <p class="mb-4 fw-light mb-md-auto h5 lead text-balance">
                                Проекты бывают разные. К некоторым хорошо придутся определённые шаблоны и практики. Для
                                других они будут излишни.
                            </p>
                            <a
                                href="https://github.com/adelf/acwa_book_ru"
                                target="_blank"
                                class="link-body-emphasis text-decoration-none icon-link icon-link-hover stretched-link mt-4">
                                Читать книгу
                                <x-icon path="i.arrow-right" class="bi" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-md-4">
                <div class="bg-secondary rounded bg-opacity-10 p-4 p-xl-5 position-relative overflow-hidden mb-4 h-100">

                    <img src="/img/ui/pastbin.svg" alt="pastbin" class="w-auto d-block mb-4" height="100">

                    <p class="mb-4 mb-md-auto fw-light line-clamp line-clamp-3 text-balance">
                        Наш сервис делает обмен кодом максимально легким и быстрым.
                    </p>

                    <a href="{{ route('pastebin') }}"
                       class="link-body-emphasis text-decoration-none icon-link icon-link-hover stretched-link mt-4">
                        Поделиться
                        <x-icon path="i.arrow-right" class="bi" />
                    </a>
                </div>
            </div>
        </div>





        {{--
        <div class="row g-4">
            <div class="col-md-8 mb-4">
                <div class="bg-primary bg-opacity-10 rounded p-5 position-relative overflow-hidden mb-4">
                    <img src="/img/sign.svg" class="position-absolute w-50 bottom-0 end-0">
                    <div class="row">
                        <div class="col-sm-8 position-relative">
                            <h3 class="mb-3 fw-bold">Сертификат</h3>
                            <p class="mb-5 h5 fw-light lead">Получите сертификат для вас как профессионала.</p>
                            <a {{ route('courses') }} class="btn btn-primary mb-0">Посмотреть программу</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="bg-primary bg-opacity-10 rounded p-5 h-100 position-relative overflow-hidden
                        ">
                            <img src="/img/ui/tentacle_bottom.svg" class="position-absolute w-50 bottom-0 end-0">
                            <div class="row">
                                <div class="col-sm-12 position-relative">
                                    <h3 class="mb-3 fw-bold">Orchid</h3>
                                    <p class="mb-5 fw-light">
                                        В этой серии вы познакомитесь с множеством примеров, демонстрирующих,
                                        как взаимодействовать с Orchid и постройки UI с помощью PHP.
                                    </p>
                                    <a {{ route('courses') }} class="btn btn-primary mb-0">Построить админку</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-secondary rounded bg-opacity-10 p-5 h-100 position-relative overflow-hidden">
                            <img src="/img/sign.svg" class="position-absolute w-50 bottom-0 end-0">
                            <div class="row">
                                <div class="col-sm-12 position-relative">
                                    <h3 class="mb-3 fw-bold">Livewire</h3>
                                    <p class="mb-5 fw-light">
                                        Livewire быстро стал одним из самых популярных пакетов для создания приложений
                                        Laravel. Он позволяет создавать динамические компоненты в PHP, что часто
                                        приводит к тому, что вы можете полностью пропустить уровень JavaScript.
                                    </p>
                                    <a {{ route('courses') }} class="btn btn-warning mb-0">Посмотреть курс</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="bg-primary bg-opacity-10 rounded p-5 h-100 position-relative overflow-hidden">

                    <ul class="d-grid gap-4 list-unstyled">
                        <li class="d-flex gap-4 align-items-center">
                            <x-icon path="bs.heart" class="text-body-secondary flex-shrink-0" width="2em" height="2em" />
                            <div>
                                <h5 class="mb-0">Laravel Queue</h5>
                                <small>В этом видео я расскажу чем может обернуться игнорирование свойства в очередях Laravel.</small>
                            </div>
                        </li>
                        <li class="d-flex gap-4">
                            <x-icon path="bs.heart" class="text-body-secondary flex-shrink-0" width="2em" height="2em" />
                            <div>
                                <h5 class="mb-0">PHP Итераторы</h5>
                                <small> Немного пробежимся по теории и на примере рассмотрим как их использовать.
                                        В конце я дам самостоятельное задание для закрепление материала.</small>
                            </div>
                        </li>
                        <li class="d-flex gap-4">
                            <x-icon path="bs.heart" class="text-body-secondary flex-shrink-0" width="2em" height="2em" />
                            <div>
                                <h5 class="mb-0">Video embeds</h5>
                                Share videos wherever you go.
                            </div>
                        </li>

                        <li class="d-flex gap-4">
                            <x-icon path="bs.heart" class="text-body-secondary flex-shrink-0" width="2em" height="2em" />
                            <div>
                                <h5 class="mb-0">Video embeds</h5>
                                Share videos wherever you go.
                            </div>
                        </li>

                        <li class="d-flex gap-4">
                            <x-icon path="bs.heart" class="text-body-secondary flex-shrink-0" width="2em" height="2em" />
                            <div>
                                <h5 class="mb-0">Video embeds</h5>
                                Share videos wherever you go.
                            </div>
                        </li>

                        <li class="d-flex gap-4">
                            <x-icon path="bs.heart" class="text-body-secondary flex-shrink-0" width="2em" height="2em" />
                            <div>
                                <h5 class="mb-0">Video embeds</h5>
                                Share videos wherever you go.
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
--}}
        {{--
        <div class="bg-secondary rounded bg-opacity-10 p-5 h-100 my-5">
            <div class="row flex-lg-row-reverse align-items-center g-4">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1>
                    <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6 position-relative overflow-hidden">
                <div class="bg-primary bg-opacity-10 rounded p-5 h-100 position-relative overflow-hidden">
                    <img src="/img/sign.svg" class="position-absolute w-50 bottom-0 end-0">
                    <div class="row">
                        <div class="col-sm-8 position-relative">
                            <h3 class="mb-3 fw-bold">Сертификат</h3>
                            <p class="mb-5 h5 fw-light lead">Получите сертификат для вас как профессионала.</p>
                            <a {{ route('courses') }} class="btn btn-primary mb-0">Посмотреть программу</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 position-relative overflow-hidden">
                <div class="bg-secondary rounded bg-opacity-10 p-5 h-100">
                    <img src="/img/sign.svg" class="position-absolute w-50 bottom-0 end-0">
                    <div class="row">
                        <div class="col-sm-8 position-relative">
                            <h3 class="mb-3 fw-bold">Лучше курсы</h3>
                            <p class="mb-5 h5 fw-light lead">Запишитесь сейчас на самые популярные курсы.</p>
                            <a {{ route('courses') }} class="btn btn-warning mb-0">Посмотреть курс</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
    </x-container>





    <x-container>
        <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
            <div class="col-lg-8 me-auto">
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">В подборках</span>
                <h2 class="display-5 fw-semibold mb-0">Персональные русскоязычные серии</h2>
            </div>
        </div>

        <div class="row g-0 rounded bg-body-tertiary mb-5">

            <div class="col-lg-4 order-lg-last">
                <x-hero image="/img/community/orlov.jpg" text="Максим Орлов" class="rounded-end"/>
            </div>
            <div class="col-lg-8">
                <div class="p-4 p-xl-5 my-xl-5">
                    <div class="row justify-content-between row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-4 g-xl-5 text-start">
                        <div class="col">
                            <div class="d-grid gap-4 d-flex justify-content-md-start position-relative">
                                <img src="/img/ui/courses/deploy.svg" height="80">
                                <a href="https://www.youtube.com/playlist?list=PLXCVm4GFpx5BNlRCGZqVFK1IMUampm3Q_"
                                   class="link-body-emphasis stretched-link text-decoration-none text-balance">
                                    <h5 class="mb-2">Деплой</h5>
                                    <p class="opacity-75 line-clamp line-clamp-3 small">
                                        Деплой (CI/CD) Laravel на хостинг автоматически (3 способа)
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-4 d-flex justify-content-md-start position-relative">
                                <img src="/img/ui/courses/laravel.svg" height="80">
                                <a href="https://www.youtube.com/playlist?list=PLXCVm4GFpx5CZf4X5ppNJTPsaGwSlBXLX"
                                   class="link-body-emphasis stretched-link text-decoration-none text-balance">
                                    <h5 class="mb-2">Laravel</h5>
                                    <p class="opacity-75 line-clamp line-clamp-3 small">
                                        Рассмотрим все возможности фреймворка на 2023 год.
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-4 d-flex justify-content-md-start position-relative">
                                <img src="/img/ui/courses/helpers.svg" height="80">
                                <a href="https://www.youtube.com/playlist?list=PLXCVm4GFpx5DMQeuzyQwZW8QtslxsUxFy"
                                   class="link-body-emphasis stretched-link text-decoration-none">
                                    <h5 class="mb-2">Laravel Helpers</h5>
                                    <p class="opacity-75 line-clamp line-clamp-3 small">
                                        Мои функции хелперы с которыми я работаю ежедневно.
                                    </p>
                                </a>
                            </div>
                        </div>

                        <div class="col">
                            <div class="d-grid gap-4 d-flex justify-content-md-start position-relative">
                                <img src="/img/ui/courses/tailwind.svg" height="80">
                                <a href="https://www.youtube.com/playlist?list=PLXCVm4GFpx5AjF_3jMD6tsDI6eS-yc92U"
                                   class="link-body-emphasis stretched-link text-decoration-none">
                                    <h5 class="mb-2">Tailwind</h5>
                                    <p class="opacity-75 line-clamp line-clamp-3 small">
                                        Верстаем ВКонтакте с помощью инструмента Tailwind
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row g-0 rounded bg-body-tertiary mb-5">
            <div class="col-lg-4">
                <x-hero image="/img/community/afanasyev.jpg" text="Дмитрий Афанасьев" class="rounded-start"/>
            </div>

            <div class="col-lg-8">
                <div class="p-4 p-xl-5 my-xl-5">
                    <div class="row justify-content-between row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-4 g-xl-5 text-start">
                        <div class="col">
                            <div class="d-grid gap-4 d-flex justify-content-md-start position-relative">
                                <img src="/img/ui/courses/git.svg" height="80">
                                    <a href="https://www.youtube.com/playlist?list=PLoonZ8wII66iUm84o7nadL-oqINzBLk5g"
                                       class="link-body-emphasis stretched-link text-decoration-none text-balance">
                                        <h5 class="mb-2">Git</h5>
                                        <p class="opacity-75 line-clamp line-clamp-3 small">
                                           Обязательно знать и уметь применять систему контроля версий
                                        </p>
                                    </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-4 d-flex justify-content-md-start position-relative">
                                <img src="/img/ui/courses/php.svg" height="80">
                                <a href="https://www.youtube.com/playlist?list=PLoonZ8wII66iZSicLNXhE4bxUYaKhIc-L"
                                   class="link-body-emphasis stretched-link text-decoration-none text-balance">
                                    <h5 class="mb-2">Эксперт PHP</h5>
                                    <p class="opacity-75 line-clamp line-clamp-3 small">
                                        В курсе будут рассмотрены наиболее популярные функции и механики языка PHP.
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-4 d-flex justify-content-md-start position-relative">
                                <img src="/img/ui/courses/laravel.svg" height="80">
                                <a href="https://www.youtube.com/playlist?list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak"
                                   class="link-body-emphasis stretched-link text-decoration-none">
                                    <h5 class="mb-2">Основы Laravel</h5>
                                    <p class="opacity-75 line-clamp line-clamp-3 small">
                                        Пошаговый видеокурс по фреймворку Laravel.
                                        Версии фреймворка используемые в курсе: 5.7.2 - 8.*
                                    </p>
                                </a>
                            </div>
                        </div>

                        <div class="col">
                            <div class="d-grid gap-4 d-flex justify-content-md-start position-relative">
                                <img src="/img/ui/courses/template.svg" height="80">
                                <a href="https://www.youtube.com/playlist?list=PLoonZ8wII66hKbEvIVAZnp1h4CE-4Mtk4"
                                   class="link-body-emphasis stretched-link text-decoration-none">
                                    <h5 class="mb-2">Шаблоны проектирования</h5>
                                    <p class="opacity-75 line-clamp line-clamp-3 small">
                                       Рассмотрены и реализуйте паттерны на языке PHP.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>



    <x-container>
        <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
            <div class="col-lg-8 me-auto">
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Это интересно</span>
                <h2 class="display-5 fw-semibold mb-0">PHP Code Break</h2>
            </div>
        </div>

        <div class="row g-0 rounded bg-body-tertiary mb-5">
            <div class="col-lg-4">
                <x-hero image="/img/community/udalcov.jpg" text="Валентин Удальцов" class="rounded-start"/>
            </div>

            <div class="col-lg-8">
                <div class="p-4 p-xl-5 my-xl-5">
                    <div class="row justify-content-between row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-4 g-xl-5 text-start">
                        <div class="col">
                            <div class="d-grid gap-4 d-flex justify-content-md-start position-relative">
                                <img src="/img/ui/courses/php.svg" height="80">
                                <a href="https://www.youtube.com/playlist?list=PLbaJpLafV4JGhNHMU_PMy8RCou1WGRqpT"
                                   class="link-body-emphasis stretched-link text-decoration-none text-balance">
                                    <h5 class="mb-2">PHP-линч</h5>
                                    <p class="opacity-75 line-clamp line-clamp-3 small">
                                        Анализируем код, ищем ошибки и делимся лучшими практиками.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-container>



{{--
    <x-container>
        <div class="row align-items-md-stretch overflow-hidden">
            <div class="col-lg-8">
                <div class="h-100 bg-body-tertiary rounded">
                    <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video"
                                allowfullscreen></iframe>
                    </div>

                    <div class="p-5">
                        <h2 class="mb-3">Начните работать с Laravel</h2>
                        <p class="mb-3">
                            Впервые здесь? Посмотрите наше краткое вводное видео о том, как загрузить и запустить новое
                            приложение Laravel всего за две минуты!
                        </p>

                        <a href="{{ route('advertising') }}" class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                            Посмотрите вступление
                            <x-icon path="i.arrow-right" class="bi" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-body-tertiary rounded p-4">
                    <div class="mb-2 d-flex align-items-baseline mx-3">
                        Начинаем работать
                        <span class="ms-auto">11 видео</span>
                    </div>

                    <div class="list-group list-group-flush">
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline active"
                           aria-current="true">
                            Установка
                            <span class="ms-auto">3:34</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Действия
                            <span class="ms-auto">5:53</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Свойства
                            <span class="ms-auto">7:40</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Маршрутизация
                            <span class="ms-auto">4:22</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Прослойки
                            <span class="ms-auto">6:15</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Контроллеры
                            <span class="ms-auto">9:05</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Запросы и ответы
                            <span class="ms-auto">8:30</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Представления
                            <span class="ms-auto">5:45</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Шаблонизация Blade
                            <span class="ms-auto">4:50</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Миграции Базы Данных
                            <span class="ms-auto">7:25</span>
                        </a>
                        <a {{ route('courses') }} class="list-group-item list-group-item-action d-flex align-items-baseline">
                            Посев Данных
                            <span class="ms-auto">6:40</span>
                        </a>
                        <a class="list-group-item list-group-item-action disabled text-center opacity-50" aria-disabled="true">Скоро</a>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
--}}

    <x-call-to-action link="{{ route('docs') }}" text="Посмотреть документацию">
        <x-slot:title>Мы лишь прикоснулись к поверхности.</x-slot>

        <x-slot:description>
            В Laravel есть все необходимое для создания веб-приложения, включая проверку электронной почты,
            ограничение скорости и пользовательские консольные команды.
        </x-slot>
    </x-call-to-action>

    {{--
        <x-header image="/img/porridge.svg">
            <x-slot:sup>Всё наглядно</x-slot>
            <x-slot:title>Учитесь с Laravel</x-slot>

            <x-slot:description>
                Независимо от того, являетесь ли вы новичком или уже используете Laravel, тут собраны учебные материалы,
                которые помогут вам освоить фреймворк и разработку в целом.
            </x-slot>
        </x-header>


        <div class="container py-5">
            <div class="row align-items-md-stretch g-0 rounded overflow-hidden">
                <div class="col-md-6">
                    <div class="h-100 position-relative">
                        <img src="https://i3.ytimg.com/vi/jQITs6C-GjU/maxresdefault.jpg" class="d-block h-100 w-100 object-fit-cover" style="aspect-ratio: 16/9;">
                        <a {{ route('courses') }} class="position-absolute top-0 start-0 end-0 bottom-0 bg-black opacity-75">

                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-secondary-subtle">
                        <h2 class="mb-3">Начните работать с Laravel</h2>
                        <p class="mb-3">
                            Впервые здесь? Посмотрите наше краткое вводное видео о том, как загрузить и запустить новое
                            приложение Laravel всего за две минуты!
                        </p>

                        <a href="{{ route('advertising') }}" class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                            Посмотрите вступление
                            <x-icon path="i.arrow-right" class="bi" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row row-cols-lg-3 row-cols-md-6 row-cols-sm-12 align-items-center g-5 py-5">

                @foreach (range(0, 9) as $package)
                    <div class="col">
                        <div class="bg-body-tertiary rounded h-100 position-relative overflow-hidden">
                            <img src="/img/logos/course.jpg" class="w-100 object-fit-cover">
                            <div class="p-5 pt-3">
                                <div class="row justify-content-between mb-4">
                                    <div class="col">
                                        <span class="badge bg-warning text-dark rounded-1">
                                            Новичок
                                        </span>
                                    </div>
                                </div>

                                <p class="fs-4 lh-1">
                                    Полное руководство для начинающих
                                </p>

                                <div class="d-flex align-items-baseline align-content-between">
                                    <small class="opacity-50 me-auto">Илья Чубаров</small>
                                    <p class="text-end mb-0">
                                        <a {{ route('courses') }}
                                            class="link-body-emphasis stretched-link icon-link icon-link-hover text-decoration-none">Перейти
                                            <x-icon path="i.arrow-right" class="bi" />
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    --}}
@endsection

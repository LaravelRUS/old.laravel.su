@extends('layout')
@section('type', "Главная")

@section('content')

    <x-header image="/img/ivan.svg">
            <x-slot:title>
                Современный подход для PHP проектов с
                <span class="text-primary">Laravel</span>
            </x-slot>

            <x-slot:description>
                Мы верим, что процесс разработки наиболее продуктивен, когда работа с фреймворком приносит радость и
                удовольствие. Счастливые разработчики пишут лучший код
            </x-slot>

            <x-slot:actions>
                <a href="{{ route('docs') }}" class="btn btn-primary btn-lg px-4">Начать читать!</a>
                <a href="{{ route('courses') }}" class="btn btn-outline-primary btn-lg px-4">Учиться по видео</a>
            </x-slot>
    </x-header>



    <x-container class="py-5">

        <div class="row g-4 g-md-5 justify-content-center align-items-center">
            <div class="col-xl-7 me-auto">

                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Вы ограничены только
                    фантазией</span>

                <h2 class="display-5 fw-semibold mb-5">Реализуйте потрясающие проекты.</h2>
            </div>

            {{--
            <div class="col mx-auto">
                <img src="/img/gusli.svg" class="img-fluid d-block mx-auto">
            </div>
            --}}
        </div>

        <div class="p-4 p-xl-5 bg-body-secondary rounded-3 position-relative mb-4">
            <div class="row g-4 g-md-5 align-items-center">
                <div class="col-md-7">
                    <h3 class="display-6 fw-semibold mb-4 text-balance">Веб</h3>
                    <p class="">
                        Интуитивно понятный синтаксис и множество готовых компонентов, что
                        сокращает время разработки. Мощные инструменты управляют базами данных, маршрутизацией,
                        аутентификации и кэшированием,
                        повышая производительность и масштабируемость приложения.
                    </p>

                    <a href="{{ route('feature') }}"
                       class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                        Основные возможности
                        <x-icon path="i.arrow-right" class="bi" /></a>
                </div>
                <div class="d-none d-sm-flex col">
                    <img src="/img/ui/web.svg" class="img-fluid d-block mx-auto">
                </div>
            </div>
        </div>

        <div class="p-4 p-xl-5 bg-body-secondary rounded-3 position-relative mb-4">
            <div class="row g-4 g-md-5 align-items-center">
                <div class="col-md-7">
                    <h3 class="display-6 fw-semibold mb-4 text-balance">API</h3>
                    <p class="">
                        Простое и понятное создание и управление ресурсами. Поддержка различных форматов ответов,
                        включая JSON, делает его идеальным для RESTful API. Удобная валидация данных, обработка ошибок и
                        прочие функции создают надежное и безопасное API.
                    </p>
                    <a href="{{ route('feature') }}"
                       class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                        Основные возможности
                        <x-icon path="i.arrow-right" class="bi" /></a>
                </div>
                <div class="d-none d-sm-flex col">
                    <img src="/img/ui/api.svg" class="img-fluid d-block mx-auto">
                </div>
            </div>
        </div>

        <div class="p-4 p-xl-5 bg-body-secondary rounded-3 position-relative mb-4">
            <div class="row g-4 g-md-5 align-items-center">
                <div class="col-md-7 ">
                    <h3 class="display-6 fw-semibold mb-4 text-balance mb-xl-5">Консоль</h3>
                    <p class="">
                        Обеспечивает удобный доступ к вашим приложениям через командную
                        строку, что позволяет быстро взаимодействовать с приложением.
                        Автоматизируйте рутинные задачи, создавая пользовательские команды и выполняйте их!
                    </p>
                    <a href="{{ route('feature') }}"
                       class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                        Основные возможности
                        <x-icon path="i.arrow-right" class="bi" /></a>
                </div>
                <div class="d-none d-sm-flex col">
                    <img src="/img/ui/console.svg" class="img-fluid d-block mx-auto">
                </div>
            </div>
        </div>
    </x-container>


    <div class="bg-dark-subtle text-white py-5" style="background-image: url('/img/bg-packages.svg')" data-bs-theme="dark">
        <div class="container px-4 py-5 packages">


            <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
                <!-- Right side START -->
                <div class="col-lg-6">
                    <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Пакеты сообщества</span>
                    <!-- Title -->
                    <h2 class="display-5 fw-semibold  mb-0">Великолепные дополнения</h2>
                </div>
                <!-- Right side END -->

                <!-- Left side START -->
                <div class="col-lg-6 position-relative ">
                    <p>
                        Пришло время начать создавать потрясающие сервисы и перестать тратить время на поиск пакетов и
                        изобретать велосипед.
                    </p>

                    <a href="{{ route('packages') }}"
                       class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                        Посмотреть все пакеты
                        <x-icon path="i.arrow-right" class="bi" /></a>
                </div>
                <!-- Left side END -->
            </div>

            <div class="row g-4 g-md-5">
                <div class="col">
                    <div class="p-4 p-md-5 bg-light-subtle bg-gradient rounded mb-5 position-relative overflow-hidden h-100" style="
background: #1A1319!important;">
                        <img src="/img/ui/tentacle_bottom.svg" class="d-none d-xxl-block position-absolute bottom-0 end-0 mx-4 pe-none">
                        <img src="/img/ui/tentacle_top.svg" class="d-none d-xxl-block position-absolute top-0 start-0 mx-4 pe-none">

                        <div class="mx-xl-3 my-xl-5">
                            <div class="text-xl-center mb-5">
                                <div class="col-xl-10 mx-auto">
                                    <img src="https://orchid.software/img/next/logo-full.svg" class="mw-100 w-auto d-inline-block mb-4"
                                         height="40px">
                                    <p class="mb-0 text-balance text-start text-xl-center">
                                        Мощное и простое в использовании решение для создания административных панелей и
                                        бизнес-приложений
                                    </p>
                                </div>
                            </div>


                            <div class="d-none d-md-flex row row-cols-1 row-cols-sm-1 g-3 mb-4">
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                                                <x-icon path="i.orchid1"/>
                                            </div>
                                        </div>
                                        <p class="h4 fw-semibold mb-0 text-body-emphasis">Ваш код это PHP</p>
                                    </div>
                                    <p class="text-body-secondary">
                                        Создавайте современные приложения, на 99% состоящие из PHP.
                                        Сосредоточьтесь на самом важном: создании исключительных функций для ваших
                                        пользователей.
                                    </p>
                                </div>
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                                                <x-icon path="i.orchid2"/>
                                            </div>
                                        </div>
                                        <p class="h4 fw-semibold mb-0 text-body-emphasis">Пользовательский интерфейс</p>
                                    </div>
                                    <p class="text-body-secondary">
                                        Широкий выбор потрясающих компонентов пользовательского
                                        интерфейса, включая формы ввода, диалоги, сетки данных и визуализации.
                                    </p>
                                </div>
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                                                <x-icon path="i.orchid3"/>
                                            </div>
                                        </div>
                                        <p class="h4 fw-semibold mb-0 text-body-emphasis">Глубокие погружение</p>
                                    </div>
                                    <p class="text-body-secondary">
                                        Управляйте доступами пользователей и обеспечивайте безопасность приложений
                                        без особых усилий.
                                    </p>
                                </div>
                            </div>

                            <div class="col-xl-10 text-center mx-auto">
                                <a href="{{ route('orchid') }}" class="btn btn-outline-primary btn-lg w-100">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-4 p-md-5 bg-light-subtle bg-gradient rounded mb-5 position-relative overflow-hidden h-100" style="background: #1A1319!important;">

                        <img src="/img/ui/klubok.svg" class="d-none d-xxl-block position-absolute bottom-0 end-0 m-2 pe-none">
                        <img src="/img/ui/balalaika.svg" class="d-none d-xxl-block position-absolute top-0 start-0 m-1 pe-none">

                        <div class="mx-xl-3 my-xl-5">
                            <div class="text-xl-center mb-5">
                                <div class="col-xl-10 mx-auto">
                                    <img src="/img/laravelidea.svg" class="mw-100 w-auto d-inline-block mb-4"
                                         height="40px">
                                    <p class="mb-0 text-balance text-start text-xl-center">
                                        Полезные дополнения для IDE, включая генерацию кода, автодополнение синтаксиса
                                        Eloquent, автодополнение правил валидации и многое другое.
                                    </p>
                                </div>
                            </div>


                            <div class="d-none d-md-flex row row-cols-1 row-cols-sm-1 g-3 mb-4">
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                                                <x-icon path="i.idea1"/>
                                            </div>
                                        </div>
                                        <p class="h4 fw-semibold mb-0 text-body-emphasis">Генерация кода</p>
                                    </div>
                                    <p class="text-body-secondary">
                                        Мощная настраиваемая генерация кода для Laravel, автозаполнение полей и завершение отношений.
                                    </p>
                                </div>
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                                                <x-icon path="i.idea2"/>
                                            </div>
                                        </div>
                                        <p class="h4 fw-semibold mb-0 text-body-emphasis">Eloquent завершение</p>
                                    </div>
                                    <p class="text-body-secondary">
                                        Полное автозаполнение полей и отношений, автоматическое создание фабрики ресурсов для баз данных.
                                    </p>
                                </div>
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                                                <x-icon path="i.idea3"/>
                                            </div>
                                        </div>
                                        <p class="h4 fw-semibold mb-0 text-body-emphasis">Полезные помощники</p>
                                    </div>
                                    <p class="text-body-secondary">
                                        Сотни полезных помощников, включая маршруты, валидацию, настройки и переводы, завершение имен шлюзов, поддержка Blade и многое другое.
                                    </p>
                                </div>
                            </div>

                            <div class="col-xl-10 text-center mx-auto">
                                <a href="{{ route('idea.index') }}" class="btn btn-outline-primary btn-lg w-100">Перейти</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>





            {{--
            <div class="row g-4" style="min-height: 450px">

                <div class="col-sm-6 col-lg-3">
                    <!-- Card -->
                    <div class="card rounded-3 text-white bg-opacity-50 p-4 overflow-hidden h-100 simple-gradient shadow"
                        style="background-color: #312e3e;">
                        <!-- Card header -->
                        <div class="card-header bg-transparent p-0">
                            <h6>Лучшая Админка</h6>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-0 mt-3">
                            <!-- Title -->
                            <h3 class="mb-2"><a href="#"
                                    class="stretched-link link-light text-decoration-none">Orchid</a></h3>
                            <small>
                                Мощное и простое в использовании решение для создания административных панелей и
                                бизнес-приложений.
                            </small>
                            <!-- Image -->
                            <img src="https://orchid.software/img/next/attachments.svg" class="opacity-5 mb-n5 mt-5"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <!-- Card -->
                    <div class="card simple-gradient text-white bg-opacity-50 p-4 overflow-hidden h-100 shadow"
                        style="background-color: #52545e">
                        <!-- Card header -->
                        <div class="card-header bg-transparent p-0">
                            <h6>Среда Разработки</h6>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-0 mt-3">
                            <!-- Title -->
                            <h3 class="mb-2"><a href="#"
                                    class="stretched-link link-light text-decoration-none">Laravel
                                    IDEA</a>
                            </h3>
                            <small>
                                Полный автокомплит полей и отношений практически во всех методах и функциях.
                            </small>
                            <!-- Image -->
                            <img src="https://laravel-idea.com/img/logo.svg" class="opacity-5 mb-n5 mt-5 d-block ms-auto"
                                style="min-height: 120px" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <!-- Card -->
                    <div class="card text-white bg-opacity-50 p-4 overflow-hidden h-100 simple-gradient shadow"
                        style="background-color: #bf4545">
                        <!-- Card header -->
                        <div class="card-header bg-transparent p-0">
                            <h6>Надёжные Утилиты</h6>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-0 mt-3">
                            <!-- Title -->
                            <h3 class="mb-2"><a href="#"
                                    class="stretched-link link-light text-decoration-none">CyberCog</a></h3>
                            <small>Полезные утилиты на каждый день</small>
                            <!-- Image -->
                            <img src="https://avatars.githubusercontent.com/u/5887416?s=200&v=4"
                                class="opacity-5 mb-n5 mt-5 d-block ms-auto rounded-4" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <!-- Card -->
                    <div class="card text-white bg-info bg-opacity-50 p-4 overflow-hidden h-100 simple-gradient shadow">
                        <!-- Card header -->
                        <div class="card-header bg-transparent p-0">
                            <h6>Очень скоро</h6>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-0 mt-3">
                            <!-- Title -->
                            <h3 class="mb-2"><a href="#"
                                    class="stretched-link link-light text-decoration-none">Railt</a></h3>
                            <small class="lead">GraphQL Framework</small>
                            <!-- Image -->
                            <img src="assets/images/element/exam.svg" class="opacity-5 mb-n5" alt="">
                        </div>
                    </div>
                </div>

            </div>
                   --}}
        </div>
    </div>


    @include('particles.sponsors')

    <div class="container mt-5 py-5">
        <div class="row g-4 g-md-5 align-items-center justify-content-between">
            <div class="col-xl-7 col-md-6 order-2 order-md-1">
                <div class="row mt-0 mt-xl-5 mb-xl-4">
                    <!-- Review -->
                    <div class="col-xl-6 position-relative mb-0 mt-0 mt-md-5 d-none d-xl-block">
                        <!-- SVG -->
                        <figure class="text-primary position-absolute top-0 start-0 translate-middle mb-3">
                            <img src="/img/bird.svg" class="z-n1 user-select-none d-none d-xxl-block">
                        </figure>

                        <div class="bg-body-tertiary text-center p-4 rounded position-relative mb-5 mb-md-0">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl mb-3">
                                <img class="avatar-img rounded-circle" loading="lazy"
                                    src="https://avatars.githubusercontent.com/SerafimArts?v=4" alt="avatar">
                            </div>
                            <!-- Content -->
                            <blockquote class="px-3">
                                <p class="text-balance mb-0">
                                    «Laravel - лучшее решение для <span class="text-primary">быстрого запуска</span> PHP приложений! 🚀»
                                </p>
                            </blockquote>

                            <!-- Info -->
                            <p class="mb-0 fw-semibold">Кирилл Несмеянов</p>
                        </div>
                    </div>

                    <!-- Mentor list -->
                    <div class="col-12 col-xl-6 mt-5 mt-md-0 d-none d-md-block">
                        <div class="bg-body-tertiary p-4 rounded d-inline-block position-relative">
                            <!-- Icon -->
                            <div
                                class="icon-lg bg-warning rounded-circle position-absolute top-0 start-100 translate-middle">
                                <i class="bi bi-shield-fill-check text-dark"></i>
                            </div>
                            <!-- Title -->
                            <h6 class="mb-4"><span class="text-primary">150+</span> профессионалов в Laravel разработке</h6>


                            <!-- Mentor Item -->
                            <div class="d-flex align-items-center mb-4">
                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle"
                                         loading="lazy"
                                         src="https://avatars.githubusercontent.com/Butochnikov?v=4" alt="avatar">
                                </div>
                                <!-- Info -->
                                <div class="ms-2">
                                    <h6 class="mb-0">Алексей Буточников</h6>
                                    <p class="mb-0 small">Лидер сообщества</p>
                                </div>
                            </div>

                            <!-- Mentor Item -->
                            <div class="d-flex align-items-center mb-4">
                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle"
                                         loading="lazy"
                                        src="https://avatars.githubusercontent.com/tabuna?v=4" alt="avatar">
                                </div>
                                <!-- Info -->
                                <div class="ms-2">
                                    <h6 class="mb-0">Александр Черняев</h6>
                                    <p class="mb-0 small">Автор множества пакетов</p>
                                </div>
                            </div>

                            <!-- Mentor Item -->
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle"
                                         loading="lazy"
                                        src="https://avatars.githubusercontent.com/dmitriy-afanasyev?v=4" alt="avatar">
                                </div>
                                <!-- Info -->
                                <div class="ms-2">
                                    <h6 class="mb-0">Дмитрий Афанасьев</h6>
                                    <p class="mb-0 small">Автор курсов по разработке</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- Row END -->

                <div class="row mt-5 mt-xl-0 d-none d-xl-flex">
                    <!-- Rating -->
                    <div class="col-4 mt-0 mt-xl-5 text-end position-relative z-index-1 d-none d-md-block">
                        <x-icon path="l.cube" width="46" height="53" fill="none"/>
                    </div>

                    <!-- Review -->
                    <div class="col-md-7 mt-n6 mb-0 mb-md-5">
                        <div class="bg-body-tertiary text-center p-5 rounded">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl mb-3">
                                <img class="avatar-img rounded-circle"
                                     loading="lazy"
                                    src="https://avatars.githubusercontent.com/adelf?v=4" alt="avatar">
                            </div>
                            <!-- Content -->
                            <blockquote>
                                <p class="text-balance mb-0">
                                    «Laravel - это <span class="text-primary">лучшее</span>, что произошло в моей карьере! 🤙»
                                </p>
                            </blockquote>

                            <!-- Info -->
                            <p class="mb-0 fw-semibold">Адель Файзрахманов</p>
                        </div>
                    </div>
                </div> <!-- Row END -->
            </div>
            <div class="col-xl-5 col-md-6 order-1 pe-xl-0">
                <!-- Title -->

                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl ">Не только знания и ресурсы</span>
                <h2 class="display-5 fw-semibold mb-4 ">Живое общение, новые знакомства</h2>
                <p>
                    Laravel предназначен для всех — независимо от того, занимаетесь ли вы программированием 20 лет или
                    20 минут. Астронавтов-архитекторов и хакеров выходного дня.
                    Для тех, у кого есть высшее образование, и для тех, кто бросил учебу ради своей мечты.
                    Вместе мы создаем удивительные вещи.
                </p>

                <div class="gap-3 d-block d-md-flex justify-content-center justify-content-md-start align-items-baseline">
                    <a href="{{ auth()->check() ? route('feed') : route('login') }}" class="d-block d-md-inline-block btn btn-outline-primary btn-lg px-4 mt-3">Присоединиться</a>

                    <a href="{{ route('meets') }}"
                       class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover d-none d-xxl-block">
                        Ближайшие встречи
                        <x-icon path="i.arrow-right" class="bi" /></a>
                </div>

            </div>
        </div> <!-- Row END -->
    </div>




    <div class="container mt-5 py-5">

        <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
            <div class="col-12 col-lg-6">
                <span
                    class="text-primary mb-md-3 d-block text-uppercase fw-semibold ls-xl">Это лишь некоторые из громких имен</span>
                <h2 class="display-5 fw-semibold mb-4 mb-lg-0">Вы в хорошей компании</h2>
            </div>
            <div class="col-lg-6 position-relative">
                <p>
                    За последние десятилетие Laravel привел бесчисленное количество компаний к миллионам пользователей и
                    миллиардным рыночным оценкам.
                </p>

                <a href="{{ route('jobs') }}"
                   class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">Смотреть вакансии
                    <x-icon path="i.arrow-right" class="bi" /></a>
            </div>
        </div>

        <div class="row text-center no-gutters pt-md-5 overflow-hidden" title="Ведущие компаний России доверяют Laravel">
            <div class="col-12 col-md-12 col-lg-12 mx-auto">
                <div class="row gap-4 gap-md-0 company-usage align-items-center vertical-overflow pe-none">
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/gpn.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/tinkoff.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/megafon.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/mts.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/rbk.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/sber.svg">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

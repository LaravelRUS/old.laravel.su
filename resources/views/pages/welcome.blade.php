@extends('layout')
@section('type', "Главная")

@section('content')

    <x-header image="/img/ivan.svg">

        {{--
            <x-slot:title>
                Создавайте элегантные приложения с
                <span class="text-primary">Laravel</span>
            </x-slot>
        --}}
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
            <div class="col-xl-7 text-center text-lg-start me-auto">

                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Вы ограничены только
                    фантазией</span>

                <h2 class="display-5 fw-semibold mb-5">Реализовывайте потрясающие проекты.</h2>
            </div>

            {{--
            <div class="col mx-auto">
                <img src="/img/gusli.svg" class="img-fluid d-block mx-auto">
            </div>
            --}}
        </div>

        <div class="p-4 p-xxl-5 bg-body-secondary rounded-3 position-relative mb-4">
            <div class="row g-4 g-md-5 align-items-center">
                <div class="col-md-7 text-center text-sm-start">
                    <h3 class="display-6 fw-semibold mb-4 text-balance">Веб</h3>
                    <p class="">
                        Интуитивно понятный синтаксис и множество готовых компонентов, что
                        сокращает время разработки. Мощные инструменты управляют базами данных, маршрутизацией,
                        аутентификации и кэшированием,
                        повышая производительность и масштабируемость приложения.
                    </p>

                    <a href="{{ route('feature') }}"
                       class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                        Основные возможности
                        <x-icon path="bs.arrow-right" /></a>
                </div>
                <div class="d-none d-sm-flex col">
                    <img src="/img/ui/web.svg" class="img-fluid d-block mx-auto">
                </div>
            </div>
        </div>

        <div class="p-4 p-xxl-5 bg-body-secondary rounded-3 position-relative mb-4">
            <div class="row g-4 g-md-5 align-items-center">
                <div class="col-md-7 text-center text-sm-start">
                    <h3 class="display-6 fw-semibold mb-4 text-balance">API</h3>
                    <p class="">
                        Простое и понятное создание и управление ресурсами. Поддержка различных форматов ответов,
                        включая JSON, делает его идеальным для RESTful API. Удобная валидация данных, обработка ошибок и
                        прочие функции создают надежное и безопасное API.
                    </p>
                    <a href="{{ route('feature') }}"
                       class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                        Основные возможности
                        <x-icon path="bs.arrow-right" /></a>
                </div>
                <div class="d-none d-sm-flex col">
                    <img src="/img/ui/api.svg" class="img-fluid d-block mx-auto">
                </div>
            </div>
        </div>

        <div class="p-4 p-xxl-5 bg-body-secondary rounded-3 position-relative mb-4">
            <div class="row g-4 g-md-5 align-items-center">
                <div class="col-md-7 text-center text-sm-start">
                    <h3 class="display-6 fw-semibold mb-4 text-balance">Консоль</h3>
                    <p class="">
                        Обеспечивает удобный доступ к вашим приложениям через командную
                        строку, что позволяет быстро взаимодействовать с приложением.
                        Автоматизируйте рутинные задачи, создавая пользовательские команды и выполняйте их!
                    </p>
                    <a href="{{ route('feature') }}"
                       class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                        Основные возможности
                        <x-icon path="bs.arrow-right" /></a>
                </div>
                <div class="d-none d-sm-flex col">
                    <img src="/img/ui/console.svg" class="img-fluid d-block mx-auto">
                </div>
            </div>
        </div>


    </x-container>

{{--
    <div class="container py-5">

        <div class="row g-5 justify-content-center align-items-center">

            <!-- Right side START -->
            <div class="col-xl-6 text-center text-xl-start">

                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Вы ограничены только
                    фантазией</span>

                <!-- Title -->
                <h2 class="display-5 fw-semibold mb-5">Реализовывайте потрясающие проекты.</h2>

                <!-- Features START -->
                <div class="row g-5">
                    <!-- Item -->
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                                <path
                                    d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                                    stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                                    stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <h5 class="fs-4 mt-2  fw-semibold">Routing</h5>
                        <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                                        приложении.</p>
                    </div>
                    <!-- Item -->
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                                <path
                                    d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                                    stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                                    stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <h5 class="fs-4 mt-2  fw-semibold">Auth</h5>
                        <p class="mb-0">Аутентификация и авторизация позволяет настроить любой уровень прав и
                                        доступа.</p>
                    </div>
                    <!-- Item -->
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                                <path
                                    d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                                    stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                                    stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </div>
                        <h5 class="fs-4 mt-2  fw-semibold">Eloquent ORM</h5>
                        <p class="mb-0">Позволяет эффективно взаимодействовать с данными вашего приложения.</p>
                    </div>
                    <!-- Item -->
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                                <path
                                    d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                                    stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                                    stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </div>
                        <h5 class="fs-4 mt-2  fw-semibold">Validation</h5>
                        <p class="mb-0">Содержит более 90 встроенных правил проверки произвольных данных.</p>
                    </div>
                </div>
                <!-- Features END -->
            </div>
            <!-- Right side END -->

            <!-- Left side START -->
            <div class="col-lg-6">

                <div class="col-6 mx-auto">
                    <img src="/img/gusli.svg" class="img-fluid">
                </div>
                <div class="position-relative">

                <!-- Svg decoration -->
                <figure class="position-absolute top-0 end-0 d-none d-md-block me-5">
                    <x-icon path="l.dots" class="text-primary opacity-2" height="400" width="400" />
                </figure>

                <pre class="rounded-3 position-relative bg-dark p-4 text-white shadow language-php" tabindex="0"><code
                        class="language-php">Route::post('/task', function (Request $request) {

     $request-&gt;validate([
        'name' =&gt; 'required|max:255',
     ])

    $task = new Task;
    $task-&gt;name = $request-&gt;name;
    $task-&gt;save();

    return redirect('/');
});
</code></pre>
                </div>
            </div>
            <!-- Left side END -->

        </div>

    </div>
--}}

    <div class="bg-dark-subtle text-white py-5" style="background-image: url('/img/bg-packages.svg')" data-bs-theme="dark">
        <div class="container px-4 py-5 packages">



            <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
                <!-- Right side START -->
                <div class="col-lg-6 text-center text-lg-start">
                    <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Пакеты сообщества</span>
                    <!-- Title -->
                    <h2 class="display-5 fw-semibold  mb-0">Великолепные дополнения</h2>
                </div>
                <!-- Right side END -->

                <!-- Left side START -->
                <div class="col-lg-6 position-relative text-center text-sm-start">
                    <p>
                        Пришло время начать создавать потрясающие сервисы и перестать тратить время на поиск пакетов и
                        изобретать велосипед.
                    </p>

                    <a href="{{ route('packages') }}"
                       class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                        Посмотреть все пакеты
                        <x-icon path="bs.arrow-right" /></a>
                </div>
                <!-- Left side END -->
            </div>

            {{--
            <div class="row mb-5">
                <div class="col-12 col-md-10 col-lg-7">

                    <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Пакеты сообщества</span>

                    <!-- Heading -->
                    <h2 class="display-5 fw-semibold mb-4">
                        Великолепные дополнения
                    </h2>

                    <!-- Text -->
                    <p class="fs-lg mb-6 mb-md-8">
                        Стандартная поставка Laravel предлагает элегантные решения, необходимые всем современным
                        веб-приложениям.
                        Пришло время начать создавать потрясающие сервисы и перестать тратить время на поиск пакетов и
                        изобретать велосипед.
                    </p>
                </div>
            </div> <!-- / .row -->
                   --}}

            <div class="row">
                <div class="col">
                    <div class="p-5 bg-light-subtle bg-gradient rounded mb-5 position-relative overflow-hidden" style="border-radius: 2rem;
background: #1A1319!important;
box-shadow: 0px 142px 53px -120px rgba(20, 20, 24, 0.89), 0px 2px 4px 0px rgba(0, 0, 0, 0.09);">
                        <img src="/img/ui/tentacle_bottom.svg" class="d-none d-xxl-block position-absolute bottom-0 end-0 mx-4 pe-none">
                        <img src="/img/ui/tentacle_top.svg" class="d-none d-xxl-block position-absolute top-0 start-0 mx-4 pe-none">

                        <div class="mx-xl-3 my-xl-5">
                            <div class="text-xl-center mb-5">
                                <div class="col-xl-10 mx-auto">
                                    <img src="https://orchid.software/img/next/logo-full.svg" class="mw-100 w-auto d-inline-block mb-4"
                                         height="40px">
                                    <p class="mb-0 text-balance text-center text-sm-start text-xl-center">
                                        Мощное и простое в использовании решение для создания административных панелей и
                                        бизнес-приложений
                                    </p>
                                </div>
                            </div>


                            <div class="d-none d-xl-flex row row-cols-1 row-cols-sm-1 g-3 mb-4">
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                                <x-icon path="bs.collection"/>
                                            </div>
                                        </div>
                                        <h4 class="fw-semibold mb-0 text-body-emphasis">Ваш код это PHP</h4>
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
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                                <x-icon path="bs.collection"/>
                                            </div>
                                        </div>
                                        <h4 class="fw-semibold mb-0 text-body-emphasis">Пользовательский интерфейс</h4>
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
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                                <x-icon path="bs.collection"/>
                                            </div>
                                        </div>
                                        <h4 class="fw-semibold mb-0 text-body-emphasis">Глубокие погружение</h4>
                                    </div>
                                    <p class="text-body-secondary">
                                        Управление разрешениями, которое упрощает управление доступом пользователей в процессе
                                        разработки и поддержки.
                                    </p>
                                </div>
                            </div>

                            <div class="col-xl-10 text-center mx-auto">
                                <a href="https://orchid.software" target="_blank" class="btn btn-outline-primary btn-lg w-100">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-5 bg-light-subtle bg-gradient rounded mb-5 position-relative overflow-hidden" style="background: #1A1319!important;">

                        <img src="/img/ui/klubok.svg" class="d-none d-xxl-block position-absolute bottom-0 end-0 m-2 pe-none">
                        <img src="/img/ui/balalaika.svg" class="d-none d-xxl-block position-absolute top-0 start-0 m-1 pe-none">

                        <div class="mx-xl-3 my-xl-5">
                            <div class="text-xl-center mb-5">
                                <div class="col-xl-10 mx-auto">
                                    <img src="/img/laravelidea.svg" class="mw-100 w-auto d-inline-block mb-4"
                                         height="40px">
                                    <p class="mb-0 text-balance text-center text-sm-start text-xl-center">
                                        Полезные дополнения для IDE, включая генерацию кода, автодополнение синтаксиса
                                        Eloquent, автодополнение правил валидации и многое другое.
                                    </p>
                                </div>
                            </div>


                            <div class="d-none d-xl-flex row row-cols-1 row-cols-sm-1 g-3 mb-4">
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                                <x-icon path="bs.collection"/>
                                            </div>
                                        </div>
                                        <h4 class="fw-semibold mb-0 text-body-emphasis">Завершение правил валидации</h4>
                                    </div>
                                    <p class="text-body-secondary">
                                        Мощная настраиваемая генерация кода позволяет быстро создавать каждую часть приложения
                                        Laravel
                                    </p>
                                </div>
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                                <x-icon path="bs.collection"/>
                                            </div>
                                        </div>
                                        <h4 class="fw-semibold mb-0 text-body-emphasis">Красноречивое завершение</h4>
                                    </div>
                                    <p class="text-body-secondary">
                                        Управление разрешениями, которое упрощает управление доступом пользователей в процессе
                                        разработки и поддержки.
                                    </p>
                                </div>
                                <div class="col d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div
                                                class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                                <x-icon path="bs.collection"/>
                                            </div>
                                        </div>
                                        <h4 class="fw-semibold mb-0 text-body-emphasis">Глубокие погружение</h4>
                                    </div>
                                    <p class="text-body-secondary">
                                        Управление разрешениями, которое упрощает управление доступом пользователей в процессе
                                        разработки и поддержки.
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
            <div class="col-xl-7 order-2 order-xl-1">
                <div class="row mt-0 mt-xl-5 mb-xl-4">
                    <!-- Review -->
                    <div class="col-md-6 position-relative mb-0 mt-0 mt-md-5">
                        <!-- SVG -->
                        <figure class="text-primary position-absolute top-0 start-0 translate-middle mb-3">
                            <img src="/img/bird.svg" class="z-n1 user-select-none d-none d-xxl-block">
                        </figure>

                        <div class="bg-body-tertiary text-center p-4 rounded position-relative mb-5 mb-md-0">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl mb-3">
                                <img class="avatar-img rounded-circle"
                                    src="https://xsgames.co/randomusers/avatar.php?g=male&4" alt="avatar">
                            </div>
                            <!-- Content -->
                            <blockquote class="px-3">
                                <p>
                                    Laravel - мой надежный спутник в путешествии программиста, который помогает
                                    мне раскрыть свой потенциал и достичь высоких результатов.
                                </p>
                            </blockquote>

                            <!-- Info -->
                            <p class="mb-0 fw-semibold">Кирил Несмеянов</p>
                        </div>
                    </div>

                    <!-- Mentor list -->
                    <div class="col-md-6 mt-5 mt-md-0 d-none d-md-block">
                        <div class="bg-body-tertiary p-4 rounded d-inline-block position-relative">
                            <!-- Icon -->
                            <div
                                class="icon-lg bg-warning rounded-circle position-absolute top-0 start-100 translate-middle">
                                <i class="bi bi-shield-fill-check text-dark"></i>
                            </div>
                            <!-- Title -->
                            <h6 class="mb-4"><span class="text-primary">150+</span> экспертов в Laravel разработке</h6>
                            <!-- Mentor Item -->
                            <div class="d-flex align-items-center mb-4">
                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle"
                                        src="https://xsgames.co/randomusers/avatar.php?g=male&2" alt="avatar">
                                </div>
                                <!-- Info -->
                                <div class="ms-2">
                                    <h6 class="mb-0">Кирил Несмеянов</h6>
                                    <p class="mb-0 small">Автор популярных пакетов</p>
                                </div>
                            </div>

                            <!-- Mentor Item -->
                            <div class="d-flex align-items-center mb-4">
                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle"
                                        src="https://avatars.githubusercontent.com/dmitriy-afanasyev?v=4" alt="avatar">
                                </div>
                                <!-- Info -->
                                <div class="ms-2">
                                    <h6 class="mb-0">Дмитрий Афанасьев</h6>
                                    <p class="mb-0 small">Автор курсов по разработке</p>
                                </div>
                            </div>

                            <!-- Mentor Item -->
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle"
                                        src="https://avatars.githubusercontent.com/Butochnikov?v=4" alt="avatar">
                                </div>
                                <!-- Info -->
                                <div class="ms-2">
                                    <h6 class="mb-0">Алексей Буточников</h6>
                                    <p class="mb-0 small">Лидер сообщества</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row END -->

                <div class="row mt-5 mt-xl-0">
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
                                    src="https://xsgames.co/randomusers/avatar.php?g=male" alt="avatar">
                            </div>
                            <!-- Content -->
                            <blockquote>
                                <p>
                                    Laravel - <span class="text-primary">лучшее сообщество</span>, в котором находишь
                                    поддержку, знания и вдохновение.
                                </p>
                            </blockquote>

                            <!-- Info -->
                            <p class="mb-0 fw-semibold">Дмитрий Будко</p>
                        </div>
                    </div>
                </div> <!-- Row END -->
            </div>
            <div class="col-xl-5 order-1 pe-xl-0 text-center text-lg-start">
                <!-- Title -->

                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl ">Не только знания и ресурсы</span>
                <h2 class="display-5 fw-semibold mb-4 ">Живое общение, новые знакомства</h2>
                <p >
                    Не только знания и ресурсы, но и возможность общаться и взаимодействовать с другими разработчиками!
                    Активное сообщество предоставляет вам уникальную платформу для обмена опытом, нахождения вдохновения и
                    наставничества с опытными профессионалами Laravel.
                </p>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-4 mt-3">Присоединиться</a>
                @else
                    <a href="{{ route('feed') }}" class="btn btn-outline-primary btn-lg px-4 mt-3">Присоединиться</a>
                @endguest
            </div>
        </div> <!-- Row END -->
    </div>




    <div class="container mt-5 py-5">

        <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
            <div class="col-12 col-lg-6">
                <span
                    class="text-primary mb-md-3 d-block text-uppercase fw-semibold ls-xl text-center text-lg-start">Это лишь некоторые из громких имен</span>
                <h2 class="display-5 fw-semibold mb-4 mb-lg-0 text-center text-lg-start">Вы в хорошей кампании</h2>
            </div>
            <div class="col-lg-6 position-relative text-center text-sm-start">
                <p>
                    За последние десятилетие Laravel привел бесчисленное количество компаний к миллионам пользователей и
                    миллиардным рыночным оценкам.
                </p>

                <a href="{{ route('jobs') }}"
                   class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">Смотреть вакансии
                    <x-icon path="bs.arrow-right" /></a>
            </div>
        </div>

        <div class="row text-center no-gutters pt-md-5" title="Ведущие компаний России доверяют Laravel">
            <div class="col-12 col-md-12 col-lg-12 mx-auto">
                <div class="row gap-4 gap-md-0 company-usage align-items-center">
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/zenit.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/leroy-merlin.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/megafon.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/mts.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/eldorado.svg">
                    </div>
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/rifgosh.svg">
                    </div>
                    {{--
                    <div class="col-4 col-sm-5 col-md-2 m-auto">
                        <img alt="image" class="img-fluid" src="/img/usage/vkusno.svg">
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>

@endsection

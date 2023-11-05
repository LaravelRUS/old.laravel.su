@extends('layout')

@section('content')
    <x-header image="/img/sign.svg">
        <x-slot:sup>Одна платформа, множество вариантов</x-slot>
        <x-slot:title>Всё что нужно для достижения цели.</x-slot>

        <x-slot:description>
            «Из коробки» Laravel предлагает элегантные решения для множества функций, необходимых всем современным
            веб-приложениям. Пришло время начать создавать потрясающие приложения!
        </x-slot>
    </x-header>

    <div class="container py-5">

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Web</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>
            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">

                    <div class="mb-4">
                        <p>
                            Laravel - это по-настоящему мощный фреймворк для разработки веб-приложений. Он
                            пользуется широкой популярностью благодаря своей простоте и элегантности кода. Множество
                            успешных веб-проектов, включая платформу Medium и онлайн-рынок Etsy, используют Laravel в
                            качестве основы. Он предлагает гибкую систему маршрутизации, ORM для работы с базой данных,
                            шаблонизатор Blade для удобного отображения данных и другие функциональные возможности.
                            Laravel имеет активное сообщество разработчиков и обновляется регулярно, что обеспечивает
                            его стабильность и развитие.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h5>Крутой Шаблонизатор Blade</h5>

                        <p class="pe-5">
                            Laravel Blade — мощный шаблонизатор. Он не ограничивает использование кодов PHP, как это
                            делают другие шаблоны. Он не только самый популярный в использовании, но и самый гибкий. Он
                            обрабатывается быстрее, поскольку Laravel улавливает соответствующие представления.
                        </p>
                    </div>

                    <h5>Используйте технологию JavaScript, которую вы предпочитаете.</h5>

                    <div class="bg-body p-3 rounded-3 mb-3 pe-none">
                        <div class="row align-items-center">
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/angular.svg">
                            </div>
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/react.svg">
                            </div>
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/vuejs.svg">
                            </div>
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/ember.svg">
                            </div>
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/svelte.svg">
                            </div>
                        </div>
                    </div>

                    Мы не делаем предположений относительно JS Frameworks, которые вы предпочитаете использовать. Вот почему
                    мы разработали Ionic для полной интеграции со всеми лучшими интерфейсными фреймворками, включая Angular,
                    React, Vue или даже без фреймворка.

                    <p class="pe-5">
                        Рассказать о React, Angular или Vue
                        Встроенная поддержка сборки ресурсов через Webpack/Vite или использование вообще без какой-либо
                        сборки.
                    </p>

                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">API</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">
                    <p>
                        Laravel - отличный выбор, если вам нужно создать мощное и функциональное API. Он
                        предоставляет вам все необходимые инструменты и решения для разработки RESTful API. С
                        помощью механизма маршрутизации Laravel вы можете легко определить точки входа и создать
                        простые и понятные эндпоинты для вашего API. Встроенная сериализация данных позволяет легко
                        форматировать данные для передачи в формате JSON или других форматах. Кроме того, Laravel
                        имеет встроенную систему аутентификации, которая делает добавление безопасности в ваше API
                        очень простым. Laravel Passport позволяет вам создавать токены доступа для аутентификации
                        пользователей и защиты доступа к вашему API. Это делает Laravel идеальным инструментом для
                        создания надежных и защищенных серверных API.
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Реактивные</h5>
                <p class="mb-0">Хотите создавать полнофункциональные веб-приложения без необходимости активного
                    использования JavaScript?</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">

                    <p>
                        Хотите создавать полнофункциональные веб-приложения без необходимости активного
                        использования JavaScript? Laravel Livewire и Hotwire - вот что вам нужно. Livewire позволяет
                        вам создавать интерактивные компоненты, используя только серверный код PHP. Он автоматически
                        обрабатывает динамическое взаимодействие и обновление данных посредством AJAX без
                        необходимости писать JavaScript-код. Hotwire в свою очередь обеспечивает эффективную
                        передачу данных между клиентскими и серверными компонентами, позволяя разрабатывать
                        отзывчивые и интерактивные интерфейсы. Вместе они обеспечивают удобное и продуктивное
                        разработку без традиционных сложностей фронтенда. Laravel Livewire/Hotwire - это лучшее
                        решение для создания полнофункциональных веб-приложений с минимальным использованием
                        JavaScript.
                    </p>

                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2 fw-semibold">Интранет</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">
                    <p>
                        Управление административной панелью может быть утомительной задачей, но не с Laravel Orchid.
                        Этот пакет инструментов значительно упрощает процесс разработки административных панелей в
                        Laravel-приложениях. С помощью Laravel Orchid вы можете быстро создавать красивые и
                        функциональные разделы, формы и таблицы с минимальным написанием кода. Он автоматически
                        генерирует административный интерфейс на основе ваших моделей, что позволяет вам
                        сосредоточиться на разработке функциональности, а не на создании пользовательского
                        интерфейса. Orchid также предоставляет настраиваемые роли и права доступа, что позволяет вам
                        легко определить уровень доступа для разных пользователей. Благодаря Laravel Orchid
                        управление административными задачами в Laravel становится простым и эффективным.
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                        <x-icon path="bs.terminal" />
                    </div>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Консоль</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.terminal" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Отслеживание и регистрация событий </h4>
                        <p class="text-body-secondary">
                            Вся информацию о событиях, происходящих в вашем приложении. Будь то отправка электронной почты,
                            записи в журнале или
                            какие-либо другие события, Telescope фиксирует их и дает вам возможность легко просмотреть и
                            проанализировать.
                        </p>
                    </div>

                    <p>
                        Управление административной панелью может быть утомительной задачей, но не с Laravel Orchid.
                        Этот пакет инструментов значительно упрощает процесс разработки административных панелей в
                        Laravel-приложениях. С помощью Laravel Orchid вы можете быстро создавать красивые и
                        функциональные разделы, формы и таблицы с минимальным написанием кода. Он автоматически
                        генерирует административный интерфейс на основе ваших моделей, что позволяет вам
                        сосредоточиться на разработке функциональности, а не на создании пользовательского
                        интерфейса. Orchid также предоставляет настраиваемые роли и права доступа, что позволяет вам
                        легко определить уровень доступа для разных пользователей. Благодаря Laravel Orchid
                        управление административными задачами в Laravel становится простым и эффективным.
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Настольные приложение</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">
                    <p>
                        Управление административной панелью может быть утомительной задачей, но не с Laravel Orchid.
                        Этот пакет инструментов значительно упрощает процесс разработки административных панелей в
                        Laravel-приложениях. С помощью Laravel Orchid вы можете быстро создавать красивые и
                        функциональные разделы, формы и таблицы с минимальным написанием кода. Он автоматически
                        генерирует административный интерфейс на основе ваших моделей, что позволяет вам
                        сосредоточиться на разработке функциональности, а не на создании пользовательского
                        интерфейса. Orchid также предоставляет настраиваемые роли и права доступа, что позволяет вам
                        легко определить уровень доступа для разных пользователей. Благодаря Laravel Orchid
                        управление административными задачами в Laravel становится простым и эффективным.
                    </p>
                </div>
            </div>
        </div>

        <div class="p-5 mt-5 bg-body-secondary rounded-4 d-flex align-items-center justify-content-between">
            <div class="col-7">
                <p class="display-6 fw-bold">Мы лишь прикоснулись к поверхности.</p>
                <p class="mb-0">
                    В Laravel есть все необходимое для создания веб-приложения, включая проверку электронной почты,
                    ограничение скорости и пользовательские консольные команды.
                </p>
            </div>

            <a href="{{ route('docs') }}" class="btn btn-outline-primary btn-lg px-4">
                Прочтите документацию
            </a>
        </div>
    </div>

    <div class="container py-5">

        <div class="row align-items-md-stretch g-5">
            <div class="col-lg-5 col-md-12">
                <div class="h-100 p-5 bg-body-tertiary rounded-4 shadow  d-flex flex-column">
                    <div class="mb-auto pe-none text-center">

                    </div>

                    <h4 class="mb-2 text-center">
                        Заголовок
                    </h4>
                    <p class="mb-0 fw-normal text-center px-3">
                        Описание
                    </p>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="h-100 p-5 bg-body-tertiary rounded-4 shadow  d-flex flex-column">

                    <div class="row mb-auto pe-0">
                        <div class="col">
                            <img src="/img/logos/websocket.svg" class="img-fluid mx-auto d-block p-2 rounded mb-5">
                        </div>
                        <div class="col">
                            <img src="/img/logos/websocket.svg" class="img-fluid mx-auto d-block p-2 rounded mb-5">
                        </div>
                    </div>

                    <h4 class="mb-2 text-center">
                        Заголовок
                    </h4>

                    <p class="mb-0 fw-normal px-3 text-center">
                        Описание
                    </p>
                </div>
            </div>

            <div class="col-lg-7 col-md-12">
                <div class="h-100 p-5 bg-body-tertiary rounded-4 shadow  d-flex flex-column">
                    <img src="/img/logos/websocket.svg" class="img-fluid mx-auto d-block p-2 rounded mb-5">

                    <h5 class="mb-2 text-center">
                        Заголовок
                    </h5>
                    <p class="mb-0 fw-normal text-center px-3">
                        Описание
                    </p>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="h-100 p-5 bg-body-tertiary rounded-4 shadow  d-flex flex-column">
                    <h4 class="mb-2 text-center mt-4">
                        Безопасность прямо со старта
                    </h4>
                    <p class="mb-3 fw-normal px-3 text-center">
                        Стартовые шаблоны усиливают безопасность ваших аккаунтов двухэтапной аутентификацией (2FA), логом
                        доступа и шифрованием
                    </p>

                    <div class="px-2 mt-auto">

                        <div
                            class="d-flex py-3 px-3 align-items-center justify-content-center align-items-top rounded bg-body mb-3">
                            <div class="d-flex mx-auto">
                                <div class="col-auto position-relative text-muted">
                                    <x-icon path="bs.tv" width="2.5em" height="2.5em" class="me-3" />
                                </div>
                            </div>
                            <div class="w-100 small d-flex justify-content-between">
                                <div>
                                    <span><strong>iPhone - iOS - Safari</strong></span>
                                    <div
                                        class="d-flex align-items-md-center flex-column flex-sm-column flex-md-row flex-lg-row">
                                        <span class="text-muted pe-2">234.21.52.64</span>
                                        <span class="text-success">This device</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="d-flex py-3 px-3 align-items-center justify-content-center align-items-top rounded bg-body mb-3">
                            <div class="d-flex mx-auto">
                                <div class="col-auto position-relative text-muted">
                                    <x-icon path="bs.phone" width="2.5em" height="2.5em" class="me-3" />
                                </div>
                            </div>
                            <div class="w-100 small d-flex justify-content-between">
                                <div>
                                    <span><strong>PC - Windows - Chrome</strong></span>
                                    <div
                                        class="small d-flex align-items-md-center flex-column flex-sm-column flex-md-row flex-lg-row">
                                        <span class="text-muted pe-2">164.92.137.166</span>
                                        <span class="text-muted">Last active 3 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="d-flex py-3 px-3 align-items-center justify-content-center align-items-top rounded-1 bg-body mb-3 border border-danger border-2">
                            <div class="d-flex mx-auto">
                                <div class="col-auto position-relative text-muted">
                                    <x-icon path="bs.phone" width="2.5em" height="2.5em" class="me-3" />
                                </div>
                            </div>
                            <div class="w-100 small d-flex justify-content-between">
                                <div>
                                    <span><strong>Samsung - Android - Chrome</strong></span>
                                    <div
                                        class="small d-flex align-items-md-center flex-column flex-sm-column flex-md-row flex-lg-row">
                                        <span class="text-muted pe-2">164.92.137.166</span>
                                        <span class="text-muted">Last active 10 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="d-flex py-3 px-3 align-items-center justify-content-center align-items-top rounded bg-body">
                            <div class="d-flex mx-auto">
                                <div class="col-auto position-relative text-muted">
                                    <x-icon path="bs.tv" width="2.5em" height="2.5em" class="me-3" />
                                </div>
                            </div>
                            <div class="w-100 small d-flex justify-content-between">
                                <div>
                                    <span><strong>Macintosh - OS X - Chrome</strong></span>
                                    <div
                                        class="small d-flex align-items-md-center flex-column flex-sm-column flex-md-row flex-lg-row">
                                        <span class="text-muted pe-2 text-nowrap">164.92.137.166</span>
                                        <span class="text-muted text-nowrap">Last active 12 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="h-100 p-5 bg-body-tertiary rounded shadow d-flex flex-column">

                    <div class="mb-auto">

                    </div>

                    <h4 class="mb-2 text-center mt-3">
                        Заголовок
                    </h4>
                    <p class="mb-3 fw-normal px-3 text-center">
                        Описание
                    </p>
                </div>
            </div>

            <div class="col-lg-7 col-md-12">
                <div class="h-100 bg-body-tertiary">

                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="h-100 p-5 bg-body-tertiary rounded shadow d-flex flex-column">
                    <h4 class="mb-3 text-center">
                        Заголовок
                    </h4>
                    <p class="fw-normal mb-0 px-3">
                        Описание
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="h-100 p-5 bg-body-tertiary rounded shadow d-flex flex-column">
                    <h4 class="mb-3 text-center">
                        Заголовок
                    </h4>
                    <p class="fw-normal mb-0 px-3">
                        Описание
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="h-100 p-5 bg-body-tertiary rounded shadow d-flex flex-column">

                    <h4 class="mb-3 text-center">Подпишитесь на <span class="text-primary"> рассылку</span></h4>
                    <span class="fw-normal px-3">Будьте в курсе наших достижений и участвуйте в раннем доступе</span>

                    <div class="subscribe-form mt-3  px-3">
                        <form id="mc-form" class="row text-start align-items-end">
                            <div class="col-md mb-2">
                                <input type="email" name="email" class="form-control mb-3 mb-md-0 "
                                    placeholder="Email адрес" required="">
                            </div>
                            <div class="d-flex col-12">
                                <button class="btn btn-primary mx-auto mx-sm-0 px-md-4 w-100" type="submit">
                                    Подписаться
                                </button>
                            </div>
                        </form>
                        <div class="form-text text-sm-start text-center">
                            Мы никогда не поделимся вашим email.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-5 mx-auto text-center py-2">
                <div class="text-black h5">…и многое другое.</div>
                <span class="text-muted">Laravel может предложить гораздо больше. Перейдите к документации, чтобы узнать
                    обо всех космических возможностях.</span>
            </div>
        </div>
    </div>
@endsection

@extends('layout')
@section('title', 'Статус переводов')

@section('content')

    <x-header image="/img/sign.svg">
        <x-slot:sup>Одержим производительностью</x-slot>
        <x-slot:title>Никогда не станет узким местом</x-slot>

        <x-slot:description>
            С помощью мощных функций, таких как кэширование, оптимизация базы данных и эффективный механизм маршрутизации,
            Laravel обеспечивает
            плавную производительность даже при высоких нагрузках.
        </x-slot>
    </x-header>

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            <div class="col d-flex flex-column align-items-start gap-2">

                <div class="mb-4">
                    <h2 class="fw-bold text-body-emphasis">Laravel Telescope</h2>
                    <p class="text-body-secondary">
                        Обеспечивает понимание запросов, поступающих в ваше приложение, исключений, записей журнала,
                        запросов
                        к базе данных, заданий в очереди, почты, уведомлений, операций кэша, запланированных задач, дампов
                        переменных и многого другого.
                    </p>
                    <a href="#">Прочитать документацию</a>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 g-5">
                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.collection" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Глубокие погружение</h4>
                        <p class="text-body-secondary">
                            Просматривайте и данные о запросах, базах данных, очередях и других аспектах
                            вашего приложения. Это дает вам бесценное понимание производительности вашего приложения и
                            помогает в принятии обоснованных решений для улучшения его работы
                        </p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.gear-fill" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Отслеживание и регистрация событий </h4>
                        <p class="text-body-secondary">
                            Вся информацию о событиях, происходящих в вашем приложении. Будь то отправка электронной почты,
                            записи в журнале или
                            какие-либо другие события, Telescope фиксирует их и дает вам возможность легко просмотреть и
                            проанализировать.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <img src="https://laravel.com/img/docs/telescope-example.png" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            <div class="col d-flex flex-column align-items-start gap-2">
                <h2 class="fw-bold text-body-emphasis">Эффективное кэширование</h2>
                <p class="text-body-secondary">
                    Обеспечивает понимание запросов, поступающих в ваше приложение, исключений, записей журнала, запросов
                    к базе данных, заданий в очереди, почты, уведомлений, операций кэша, запланированных задач, дампов
                    переменных и многого другого.
                </p>
                <a href="#" class="btn btn-primary btn-lg">Primary button</a>
            </div>

            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 g-4">
                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.collection" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.gear-fill" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.speedometer" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.table" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            <div class="col d-flex flex-column align-items-start gap-2">
                <h2 class="fw-bold text-body-emphasis">Оптимизация базы данных</h2>
                <p class="text-body-secondary">
                    Обеспечивает понимание запросов, поступающих в ваше приложение, исключений, записей журнала, запросов
                    к базе данных, заданий в очереди, почты, уведомлений, операций кэша, запланированных задач, дампов
                    переменных и многого другого.
                </p>
                <a href="#" class="btn btn-primary btn-lg">Primary button</a>
            </div>

            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 g-4">
                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.collection" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.gear-fill" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.speedometer" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.table" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            <div class="col d-flex flex-column align-items-start gap-2">
                <h2 class="fw-bold text-body-emphasis">Обработка задач в фоне</h2>
                <p class="text-body-secondary">
                    Обеспечивает понимание запросов, поступающих в ваше приложение, исключений, записей журнала, запросов
                    к базе данных, заданий в очереди, почты, уведомлений, операций кэша, запланированных задач, дампов
                    переменных и многого другого.
                </p>
                <a href="#" class="btn btn-primary btn-lg">Primary button</a>
            </div>

            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 g-4">
                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.collection" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.gear-fill" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.speedometer" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.table" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
